<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function showAppointmentForm()
    {
        return view('appointments.form');
    }

    public function scheduleAppointment(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'type' => 'required|in:presencial,online',
            'reason' => 'required|string',
        ]);

        // Aquí iría la lógica para guardar la cita en la base de datos
        // Por ahora, solo retornamos un mensaje de éxito
        return back()->with('status', 'Cita agendada con éxito.');
    }

    public function getAvailableSlots(Request $request)
    {
        $date = Carbon::parse($request->date);
        $availableSlots = [];

        // Aquí iría la lógica para obtener los slots disponibles de la base de datos
        // Por ahora, generamos slots de ejemplo
        for ($hour = 10; $hour <= 18; $hour++) {
            for ($minute = 0; $minute < 60; $minute += 40) {
                $time = sprintf("%02d:%02d", $hour, $minute);
                $availableSlots[] = $time;
            }
        }

        return response()->json($availableSlots);
    }
}