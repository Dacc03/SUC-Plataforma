<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $rol_id = Auth::user()->rol_id;

        if (!$rol_id) {
            return abort(403, 'Rol no asignado');
        }
        return match ($rol_id) {
            1 => view('dashboards.estandar'),
            2 => view('dashboards.aliado'),
            3 => view('dashboards.practicante'),
            4 => view('dashboards.voluntario'),
            5 => view('dashboards.colaborador'),
            6 => view('dashboards.director'),
            7 => view('dashboards.director_general'),
            default => abort(403),
        };
    }
}
