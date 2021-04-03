<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    // Agregar al fillable todo lo que espera la segunda forma de guardar en el controlador
    protected $fillable = [
        'nombre', 'email', 'cv', 'vacante_id'
    ];

}
