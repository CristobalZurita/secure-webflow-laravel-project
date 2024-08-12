<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // Lógica para mostrar la vista de "Nosotros"
        return view('about');
    }
}
