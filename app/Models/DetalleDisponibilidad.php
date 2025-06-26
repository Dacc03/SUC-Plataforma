<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleDisponibilidad extends Model
{
    use HasFactory;

    protected $table = 'detalle_disponibilidad';

    protected $fillable = [
        'user_id',
        'fecha',
        'hora',
        'disponible',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
