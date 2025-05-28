<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Vehicle;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CustomerController extends Controller
{
    public function cars()
    {
        $user = Auth::user();
        $customer = Customer::where('email', $user->email)->first();

        $vehicles = Vehicle::where('customer_id', $customer->customer_id)->get()->map(function ($vehicle) {
            $latestAppointment = $vehicle->appointments()->latest('appointment_date')->first();
            return [
                'vehicle' => $vehicle,
                'latest_appointment' => $latestAppointment,
            ];
        });

        return view('CustomerCarsView', [
            'user' => $user,
            'vehicles' => $vehicles,
        ]);
    }

    public function history($vehicle_id)
    {
        $user = Auth::user();

        $customer = Customer::where('email', $user->email)->firstOrFail();

        $vehicle = Vehicle::where('vehicle_id', $vehicle_id)
            ->where('customer_id', $customer->customer_id)
            ->firstOrFail();

        $appointments = $vehicle->appointments()
            ->orderByDesc('appointment_date')
            ->get();

        $upcoming = $appointments->where('status', 'pending');
        $history = $appointments->whereIn('status', ['completed', 'cancelled']);

        return view('CustomerHistoryView', [
            'user' => $user,
            'customer' => $customer,
            'vehicle' => $vehicle,
            'upcomingAppointments' => $upcoming,
            'pastAppointments' => $history,
        ]);
    }



    public function showCustomerCars()
    {
        $user = Auth::user();

        $customer = Customer::where('email', $user->email)->firstOrFail();

        $vehicles = $customer->vehicles()->with(['appointments' => function ($query) {
            $query->orderByDesc('appointment_date');
        }])->get();

        foreach ($vehicles as $vehicle) {
            $vehicle->latest_appointment = $vehicle->appointments->first();
        }

        return view('CustomerCarsView', [
            'customer' => $customer,
            'vehicles' => $vehicles,
        ]);
    }
    public function cancelAppointment($appointment_id)
    {
        $appointment = Appointment::findOrFail($appointment_id);
        $appointment->status = 'cancelled';
        $appointment->save();

        return back()->with('message', 'Lịch hẹn đã được hủy.');
    }

    public function showAppointmentDetails($id)
    {
        $user = Auth::user();
        $customer = Customer::where('email', $user->email)->firstOrFail();

        $appointment = Appointment::with('vehicle.customer')
            ->where('appointment_id', $id)
            ->whereHas('vehicle', function ($query) use ($customer) {
                $query->where('customer_id', $customer->customer_id);
            })
            ->firstOrFail();

        return view('CustomerDetailsView', [
            'appointment' => $appointment,
            'customer' => $customer,
        ]);
    }

    public function updateAppointment(Request $request, $id)
    {
        $appointment = Appointment::with('vehicle.customer')->findOrFail($id);

        // Check that the appointment belongs to the logged-in customer
        if ($appointment->vehicle->customer->email !== Auth::user()->email) {
            abort(403, 'Unauthorized');
        }

        $data = $request->validate([
            'service_type' => 'required|string|max:255',
            'appointment_date' => 'required|date',
            'vehicle_traveled' => 'nullable|integer',
            'notes' => 'nullable|string',
        ]);

        // Update fields
        $appointment->update([
            'service_type' => $data['service_type'],
            'appointment_date' => $data['appointment_date'],
            'notes' => $data['notes'] ?? $appointment->notes,
        ]);

        // Update vehicle km
        $appointment->vehicle->vehicle_traveled = $data['vehicle_traveled'] ?? $appointment->vehicle->vehicle_traveled;
        $appointment->vehicle->save();

        return back()->with('message', 'Cập nhật lịch hẹn thành công!');
    }
}
