<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// app/Http/Controllers/HomeController.php
class HomeController extends Controller
{
    public function index()
    {
        $cursos = \App\Models\Curso::latest()->take(3)->get();
        $eventos = \App\Models\Evento::orderBy('data')->take(3)->get();
        return view('home', compact('cursos', 'eventos'));
    }
}
