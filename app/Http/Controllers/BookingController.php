<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        // Aquí podrías obtener datos relacionados con las reservas y pasarlos a la vista
        $bookings = Booking::all(); // Asegúrate de tener un modelo Booking

        return view('booking.index', compact('bookings'));
    }
}
