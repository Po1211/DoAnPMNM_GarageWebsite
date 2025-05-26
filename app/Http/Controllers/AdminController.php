<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function showAppointment($id)
    {
        $appointment = Appointment::with(['vehicle.customer'])->findOrFail($id);

        return view('AdminDetailsView', [
            'appointment' => $appointment,
            'user' => Auth::user(),
        ]);
    }

    public function updateAppointment(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        $data = $request->validate([
            'service_type' => 'required|string|max:255',
            'appointment_date' => 'required|date',
            'notes' => 'nullable|string',
            'status' => 'required|in:pending,completed,canceled',
            'vehicle_traveled' => 'nullable|integer',
        ]);

        $appointment->update($data);

        return back()->with('message', 'Cập nhật lịch hẹn thành công!');
    }

    public function weeklyAppointments(Request $request)
    {
        $selectedDate = $request->query('date');
        $now = $selectedDate ? Carbon::parse($selectedDate) : Carbon::now();

        $startOfWeek = (clone $now)->startOfWeek(Carbon::MONDAY);
        $endOfWeek = (clone $now)->endOfWeek(Carbon::SUNDAY);

        $weekDates = collect();
        for ($date = $startOfWeek->copy(); $date->lte($endOfWeek); $date->addDay()) {
            $weekDates->push($date->copy());
        }

        $appointments = Appointment::whereBetween('appointment_date', [$startOfWeek, $endOfWeek])
            ->with('vehicle.customer')
            ->orderBy('appointment_date')
            ->get();

        $appointmentsByDate = [];
        foreach ($appointments as $appointment) {
            $dateKey = Carbon::parse($appointment->appointment_date)->toDateString();
            $appointmentsByDate[$dateKey][] = $appointment;
        }


        return view('AdminBookingView', [
            'appointments' => $appointments,
            'startOfWeek' => $startOfWeek,
            'endOfWeek' => $endOfWeek,
            'weekDates' => $weekDates,
            'appointmentsByDate' => $appointmentsByDate,
            'currentDate' => $now,
            'user' => Auth::user(),
        ]);
    }
}
