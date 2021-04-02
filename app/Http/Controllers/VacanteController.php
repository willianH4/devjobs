<?php

namespace App\Http\Controllers;

use App\Models\Salario;
use App\Models\Vacante;
use App\Models\Categoria;
use App\Models\Ubicacion;
use App\Models\Experiencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\VacanteController;

class VacanteController extends Controller
{

    // public function __construct()
    // {
    //     // revisar que usuario este auntenticado y verificado
    //     $this->middleware(['auth', 'verified']);
    // }
    
    public function index()
    {
        // $vacantes = Auth::user()->vacantes;

        // Segunda forma
        $vacantes = Vacante::where('user_id', auth()->user()->id )->simplePaginate(1);
        
        return view('vacantes.index', compact('vacantes'));
    }

    public function create()
    {
        // consultas
        $categoria = Categoria::all();
        $experiencia = Experiencia::all();
        $ubicacion = Ubicacion::all();
        $salario = Salario::all();
        
        return view('vacantes.create')->with('categorias', $categoria)
        ->with('experiencias', $experiencia)
        ->with('ubicaciones', $ubicacion)
        ->with('salarios', $salario);
    }


    public function store(Request $request)
    {
        // validacion
        $datos = $request->validate([
            'titulo' => 'required|min:10',
            'categoria' => 'required',
            'experiencia' => 'required',
            'ubicacion' => 'required',
            'salario' => 'required',
            'descripcion' => 'required|min:30',
            'imagen' => 'required',
            'skills' => 'required'
        ]);

        // almacenar en la DB
        Auth::user()->vacantes()->create([
            'titulo' => $datos['titulo'],
            'imagen' => $datos['imagen'],
            'descripcion' => $datos['descripcion'],
            'skills' => $datos['skills'],
            'categoria_id' => $datos['categoria'],
            'experiencia_id' => $datos['experiencia'],
            'ubicacion_id' => $datos['ubicacion'],
            'salario_id' => $datos['salario'],
        ]);

        return redirect()->action([VacanteController::class, 'index']);
    }

    
    public function show(Vacante $vacante)
    {
        return view('vacantes.show')->with('vacante', $vacante);
    }

   
    public function edit(Vacante $vacante)
    {
        //
    }

   
    public function update(Request $request, Vacante $vacante)
    {
        //
    }

   
    public function destroy(Vacante $vacante)
    {
        //
    }

    // Campos extras
    // Metodo para subir las imagenes
    public function imagen(Request $request)
    {
        $imagen = $request->file('file');
        $nombreImagen = time() . '.' . $imagen->extension();
        $imagen->move(public_path('storage/vacantes'), $nombreImagen);
        return response()->json(['correcto' => $nombreImagen]);
    }

    // borrar imagen via Ajax
    public function borrarimagen(Request $request)
    {
        if ($request->ajax()) {
            $imagen = $request->get('imagen');

            if (File::exists('storage/vacantes/' . $imagen)) {
                File::delete('storage/vacantes/' . $imagen);
            }
            return response ("Imagen eliminada", 200);
        }
    }
}