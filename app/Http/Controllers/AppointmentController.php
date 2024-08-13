<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function showAppointmentForm()
    {
        return view('appointments.form');
    }

    public function scheduleAppointment(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'type' => 'required|in:presencial,online',
            'reason' => 'required|string',
        ]);

        $appointment = new Appointment();
        $appointment->user_id = Auth::id();
        $appointment->date = $validatedData['date'];
        $appointment->time = $validatedData['time'];
        $appointment->type = $validatedData['type'];
        $appointment->reason = $validatedData['reason'];
        $appointment->save();

        return back()->with('status', 'Cita agendada con éxito.');
    }

    public function getAvailableSlots(Request $request)
    {
        $date = Carbon::parse($request->date);
        $availableSlots = [];

        // Obtener las citas ya programadas para este día
        $bookedAppointments = Appointment::whereDate('date', $date)->pluck('time')->toArray();

        // Generar slots disponibles
        for ($hour = 10; $hour <= 18; $hour++) {
            for ($minute = 0; $minute < 60; $minute += 40) {
                $time = sprintf("%02d:%02d", $hour, $minute);
                if (!in_array($time, $bookedAppointments)) {
                    $availableSlots[] = $time;
                }
            }
        }

        return response()->json($availableSlots);
    }

    public function index()
    {
        $appointments = Appointment::where('user_id', Auth::id())
                                    ->orderBy('date')
                                    ->orderBy('time')
                                    ->get();
        return view('appointments.index', compact('appointments'));
    }
}