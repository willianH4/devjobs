<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    
    public function index()
    {
        
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Categoria $categoria)
    {
        // dd($categoria->nombre);
        $vacantes = Vacante::where('categoria_id', $categoria->id)->where('activa', true)->simplePaginate(10);
        
        return view('categorias.show', compact('vacantes', 'categoria'));
    }

    public function edit(Categoria $categoria)
    {
        //
    }

    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    public function destroy(Categoria $categoria)
    {
        //
    }
}
