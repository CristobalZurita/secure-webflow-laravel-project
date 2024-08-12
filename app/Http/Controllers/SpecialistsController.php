<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpecialistsController extends Controller
{
    public function index()
    {
        // Aquí podrías obtener datos de especialistas desde una base de datos y pasarlos a la vista
        $specialists = Specialist::all(); // Asegúrate de tener un modelo Specialist

        return view('specialists.index', compact('specialists'));
    }
}
