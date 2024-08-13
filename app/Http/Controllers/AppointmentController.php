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
            ->paginate(10);
        return view('appointments.index', compact('appointments'));
    }

    public function calendar()
    {
        return view('appointments.calendar');
    }

    public function getAppointmentsForCalendar()
    {
        $appointments = Appointment::where('user_id', Auth::id())->get();
        $events = $appointments->map(function ($appointment) {
            return [
                'id' => $appointment->id,
                'title' => $appointment->reason,
                'start' => $appointment->date . 'T' . $appointment->time,
                'url' => route('appointments.show', $appointment->id)
            ];
        });
        return response()->json($events);
    }

    public function show(Appointment $appointment)
    {
        // Asegúrate de que el usuario actual sea el dueño de la cita
        if ($appointment->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para ver esta cita.');
        }
        return view('appointments.show', compact('appointment'));
    }

    public function edit(Appointment $appointment)
    {
        // Asegúrate de que el usuario actual sea el dueño de la cita
        if ($appointment->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para editar esta cita.');
        }
        return view('appointments.edit', compact('appointment'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        // Asegúrate de que el usuario actual sea el dueño de la cita
        if ($appointment->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para actualizar esta cita.');
        }

        $validatedData = $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'type' => 'required|in:presencial,online',
            'reason' => 'required|string',
        ]);

        $appointment->update($validatedData);

        return redirect()->route('appointments.show', $appointment)->with('status', 'Cita actualizada con éxito.');
    }

    public function destroy(Appointment $appointment)
    {
        // Asegúrate de que el usuario actual sea el dueño de la cita
        if ($appointment->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para cancelar esta cita.');
        }

        $appointment->delete();

        return redirect()->route('appointments.index')->with('status', 'Cita cancelada con éxito.');
    }
}