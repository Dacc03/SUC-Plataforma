<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SReunion extends Model
{
    use HasFactory;

    protected $table = 's_reunion';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'destinatario_id',
        'motivo',
        'calendario',
        'prioridad',
        'fecha_hora_inicio',
        'duracion_minutos',
    ];

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class, 'id');
    }

    public function destinatario()
    {
        return $this->belongsTo(User::class, 'destinatario_id');
    }
}
