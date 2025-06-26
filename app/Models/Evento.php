<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'evento';
    protected $fillable = [
        'titulo',
        'tipo',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'hora',
        'modalidad',
        'ubicacion',
    ];
}
