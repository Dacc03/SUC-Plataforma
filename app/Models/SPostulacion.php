<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPostulacion extends Model
{
    use HasFactory;

    protected $table = 's_postulacion';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'motivacion',
        'usu_interes',
        'compromiso',
        'archivo_cv',
    ];

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class, 'id');
    }
}
