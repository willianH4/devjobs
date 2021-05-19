<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use App\Models\Candidato;
use Illuminate\Http\Request;
use App\Notifications\NuevoCandidato;

class CandidatoController extends Controller
{
    
    public function index(Request $request)
    {

        // Obtener id
        $idVacante = $request->route('id');

        // Obtener candidatos y vacante
        $vacante = Vacante::findOrFail( $idVacante );
        // dd($vacante);
        
        // Agregamos el Policy
        $this->authorize('view', $vacante);

        return view('candidatos.index', compact('vacante'));

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // validacion
        $data = $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'cv' => 'required|mimes:pdf|max:1000',
            'vacante_id' => 'required'
        ]);

        // almacenar archivo pdf
        if ($request->file('cv')) {
            $archivo = $request->file('cv');
            $nombreArchivo = time() . "." . $request->file('cv')->extension();
            $ubicacion = public_path('/storage/cv');
            $archivo->move($ubicacion, $nombreArchivo);
        }

        $vacante = Vacante::find($data['vacante_id']);
        $vacante->candidatos()->create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'cv' => $nombreArchivo
        ]);

        $reclutador = $vacante->reclutador;
        $reclutador->notify( new NuevoCandidato($vacante->titulo, $vacante->id) );

        // Primer forma de guardar en la bd
        // $candidato = new Candidato();
        // $candidato->nombre = $data['nombre'];
        // $candidato->email = $data['email'];
        // $candidato->vacante_id = $data['vacante_id'];
        // $candidato->cv = $data['examen.pdf'];

        // Segunda forma
        // $candidatos = new Candidato($data);
        // $candidato->cv = "alguien.pdf";

        // forma 3
        // $candidato = new Candidato();
        // $candidato->fill($data);
        // $candidato->cv = "alguien.pdf";

        // $candidato->save();

        return back()->with('estado', 'Tu mensaje fue enviado exitosamente!');
    }


    public function show(Candidato $candidato)
    {
        //
    }

    public function edit(Candidato $candidato)
    {
        //
    }

    public function update(Request $request, Candidato $candidato)
    {
        //
    }

    public function destroy(Candidato $candidato)
    {
        //
    }
}
