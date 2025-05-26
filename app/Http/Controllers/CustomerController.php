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
}
