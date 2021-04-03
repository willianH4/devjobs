@extends('layouts.app')

@section('navegacion')
    @include('ui.admin_nav')    
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Candidatos: {{ $vacante->titulo }}</h1>
    
    @if ( count($vacante->candidatos) > 0 )
        <ul class="max-w-md mx-auto mt-10">
            @foreach ($vacante->candidatos as $candidato)
                <li class="p-5 border border-gray-700 mb-5 bg-gray-400">
                    <p class="mb_4">Nombre:
                        <span class="font-bold"> {{$candidato->nombre}} </span>
                    </p>
                    <p class="mb_4">Email:
                        <span class="font-bold"> {{$candidato->email}} </span>
                    </p>
                    <a class="bg-green-500 p-2 inline-block text-xs font-bold uppercase text-white mt-1" target="_blank" href="/storage/cv/{{ $candidato->cv }}">Ver CV</a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-center mt-5">No hay candidatos</p>
    @endif
@endsection