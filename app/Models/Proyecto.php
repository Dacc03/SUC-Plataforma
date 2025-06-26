<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $table = 'proyectos';

    protected $fillable = [
        'user_id',
        'titulo',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'adjunto',
        'nivel_progreso',
        'estado', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
