<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Vehicle;

use App\Mail\AppointmentConfirmation;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
  public function create()
  {
    $appointments = DB::table('appointment')
      ->whereDate('appointment_date', '>=', Carbon::today())
      ->get();

    $bookedSlots = [];

    foreach ($appointments as $appt) {
      $date = Carbon::parse($appt->appointment_date)->toDateString();
      $time = Carbon::parse($appt->appointment_date)->format('H:i');

      if (!isset($bookedSlots[$date])) $bookedSlots[$date] = [];
      $bookedSlots[$date][] = $time;
    }

    $fullyBookedDates = [];
    $fixedSlots = ['08:00', '09:00', '10:00', '11:00', '13:00', '14:00', '15:00'];

    foreach ($bookedSlots as $date => $times) {
      if (count(array_intersect($fixedSlots, $times)) === count($fixedSlots)) {
        $fullyBookedDates[] = $date;
      }
    }

    return view('BookingView', [
      'bookedSlots' => $bookedSlots,
      'fullyBookedDates' => $fullyBookedDates,
      'fixedSlots' => $fixedSlots
    ]);
  }

  public function store(Request $request)
  {
    $data = $request->validate([
      'name'     => ['required', 'string', 'max:100', 'regex:/^[\p{L}\s\-]+$/u'],
      'phone'    => 'required|string|max:20',
      'email'    => 'required|email|max:100',
      'model'    => 'required|string|max:80',
      'km'       => 'nullable|integer',
      'plate'    => [
        'required',
        'regex:/^[0-9]{2}[A-Z]-[0-9]{3,5}(\.[0-9]{2})?$/i'
      ],
      'services' => 'required|array|min:1',
      'notes'    => 'nullable|string',
      'date'     => 'required|date',
      'time'     => 'required'
    ], [
      'name.required' => 'Vui lòng nhập họ và tên.',
      'name.regex'    => 'Họ và tên không được chứa ký tự đặc biệt.',
      'phone.required' => 'Vui lòng nhập số điện thoại.',
      'email.required' => 'Vui lòng nhập email.',
      'email.email' => 'Email không hợp lệ.',
      'model.required' => 'Vui lòng nhập mẫu xe.',
      'plate.required' => 'Vui lòng nhập biển số xe.',
      'plate.regex' => 'Biển số xe không đúng định dạng.',
      'services.required' => 'Vui lòng chọn ít nhất một dịch vụ.',
      'date.required' => 'Vui lòng chọn ngày hẹn.',
      'time.required' => 'Vui lòng chọn giờ hẹn.',
    ]);


    $customer = Customer::where('email', $data['email'])
      ->orWhere('phone', $data['phone'])
      ->first();

    if (!$customer) {
      $customer = Customer::create([
        'name'  => $data['name'],
        'phone' => $data['phone'],
        'email' => $data['email'],
      ]);
    }

    $vehicle = Vehicle::where('vehicle_plate', $data['plate'])
      ->where('customer_id', $customer->customer_id)
      ->first();

    if (!$vehicle) {
      $vehicle = Vehicle::create([
        'vehicle_type'     => $data['model'],
        'vehicle_traveled' => $data['km'] ?? 0,
        'vehicle_plate'    => $data['plate'],
        'customer_id'      => $customer->customer_id,
      ]);
    } else {
      if (!is_null($data['km'])) {
        $vehicle->vehicle_traveled = $data['km'];
        $vehicle->save();
      }
    }

    $appointment = $vehicle->appointments()->create([
      'booking_date'     => now(),
      'appointment_date' => $data['date'] . ' ' . $data['time'],
      'service_type'     => implode(',', $data['services']),
      'notes'            => $data['notes'] ?? '',
    ]);

    Mail::to($customer->email)->send(new AppointmentConfirmation($appointment));
    return redirect()->route('lienhe')->with('show_modal', true);
  }
}
