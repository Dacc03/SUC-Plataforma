<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disponibilidad extends Model
{
    use HasFactory;

    protected $table = 'disponibilidad';
    protected $fillable = [
        'user_id',
        'calendario',
        'fecha_inicio',
        'fecha_fin',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
