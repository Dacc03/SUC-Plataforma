<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfiles';
    protected $fillable = [
        'user_id',
        'nombres',
        'apellidos',
        'dni',
        'fecha_nacimiento',
        'telefono',
        'direccion',
        'genero',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
