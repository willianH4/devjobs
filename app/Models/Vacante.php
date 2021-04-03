<?php

namespace App\Models;

use App\Models\User;
use App\Models\Salario;
use App\Models\Candidato;
use App\Models\Categoria;
use App\Models\Ubicacion;
use App\Models\Experiencia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacante extends Model
{
    protected $fillable = [
        'titulo', 'imagen', 'descripcion', 'skills', 'categoria_id', 'experiencia_id', 'ubicacion_id', 'salario_id'
    ];

    // Relacion 1:1 para traer el nombre en lugar del id de categoria de vacante
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Relacion 1:1 para traer el nombre en lugar del id de salario de vacante
    public function salario()
    {
        return $this->belongsTo(Salario::class);
    }

    // Relacion 1:1 para traer el nombre en lugar del id de ubicacion de vacante
    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }

    // Relacion 1:1 para traer el nombre en lugar del id de experiencia de vacante
    public function experiencia()
    {
        return $this->belongsTo(Experiencia::class);
    }

    // Relacion 1:1 para traer el nombre del reclutador de vacante
    public function reclutador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // forma 4 de guardar atraves de una relacion 1:n (de uno a mucho)
    // una vacante tiene muchos candidatos
    public function candidatos()
    {
        return $this->hasMany(Candidato::class);
    }
}