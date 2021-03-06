<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use App\Models\Ubicacion;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function __invoke(Request $request)
    {
        $ubicaciones = Ubicacion::all();
        $vacantes = Vacante::latest()->where('activa', true)->take(10)->get();
        
        return view('inicio.index', compact('vacantes', 'ubicaciones'));
    }
}
