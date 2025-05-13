<?php


namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller

{
    public function index()
    {
        $user = Auth::user();

        $customer = Customer::where('email', $user->email)->first();

        $vehicles = $customer?->vehicles ?? [];
        $appointments = [];

        foreach ($vehicles as $vehicle) {
            $vehicle->load('appointments');
            foreach ($vehicle->appointments as $appt) {
                $appointments[] = $appt;
            }
        }

        return view('profile', compact('user', 'customer', 'vehicles', 'appointments'));
    }
}
