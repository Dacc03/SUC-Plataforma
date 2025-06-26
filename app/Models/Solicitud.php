<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitud';

    protected $fillable = [
        'tipo_id',
        'estado',
        'fecha',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tipo()
    {
        return $this->belongsTo(TipoSolicitud::class, 'tipo_id');
    }

    public function reunion()
    {
        return $this->hasOne(SReunion::class, 'id');
    }
    public function postulacion()
    {
        return $this->hasOne(SPostulacion::class, 'id');
    }
}
