<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index()
    {
    $proyectos = \App\Models\Proyecto::with('user') // <--- Aquí se carga la relación
        ->where('estado', 'activo')
        ->get();

    return view('views_public.proyectos', compact('proyectos'));
    }
}
