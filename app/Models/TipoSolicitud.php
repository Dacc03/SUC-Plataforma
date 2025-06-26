<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoSolicitud extends Model
{
    use HasFactory;

    protected $table = 'tipo_solicitud';

    protected $fillable = [
        'tipo',
        'definicion',
    ];

    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class, 'tipo_id');
    }
}
