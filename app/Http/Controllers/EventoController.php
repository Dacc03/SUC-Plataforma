<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class EventoController extends Controller
{
    /**
     * Mostrar listado de todos los eventos.
     */
    public function index(Request $request)
{
    $selectedEvento = null;

    if ($request->has('selected')) {
        $selectedEvento = Evento::find($request->input('selected'));
    }

    $eventos = Evento::orderBy('fecha_inicio', 'asc')->paginate(9);

    return view('views_public.eventos', compact('eventos', 'selectedEvento'));
}


    

    /**
     * Mostrar detalles de un evento específico.
     */
    public function show($id)
    {
        $evento = Evento::findOrFail($id);
        return view('eventos.show', compact('evento'));
    }
}
