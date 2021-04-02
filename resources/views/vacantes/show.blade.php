@extends('layouts.app')

@section('styles')
    {{-- pegar aqui el cdn de lightbox --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" />
@endsection

@section('content')
    <h1 class="text-3xl text-center mt-10">{{ $vacante->titulo }}</h1>

    <div class="mt-10 mb-20 md:flex items-start">
        <div class="md:w-3/5">
            <p class="block text-gray-700 font-bold my-2">
                Publicado: <span class="font-normal">{{ $vacante->created_at->diffForHumans() }}</span>
                Por: <span class="font-normal">{{ $vacante->reclutador->name }}</span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Categoria: <span class="font-normal">{{ $vacante->categoria->nombre }}</span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Salario: <span class="font-normal">{{ $vacante->salario->nombre }}</span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Ubicacion: <span class="font-normal">{{ $vacante->ubicacion->nombre }}</span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Experiencia: <span class="font-normal">{{ $vacante->experiencia->nombre }}</span>
            </p>

            <h2 class="text-2xl text-center mt-10 text-gray-700 mb-5">Conocimientos y tecnologias</h2>
            @php
                // explode busca e elimina la coma
                $arraySkills = explode(",", $vacante->skills)
            @endphp
            @foreach ($arraySkills as $skills)
            <p class="inline-block border border-gray-400 rounded py-2 px-8 text-gray-700 my-2">
                {{ $skills }}
            </p>
            @endforeach

            <a href="/storage/vacantes/{{ $vacante->imagen }}" data-lightbox="imagen" data-title="{{ $vacante->titulo }}">
                <img src="/storage/vacantes/{{ $vacante->imagen}}" alt="Imagen de la vacante" class="w-40 mt-10">
            </a>
            
            <div class="descripcion mt-10 mb-5">
                {!! $vacante->descripcion !!}
            </div>

        </div>

        <aside class="md:w-2/5 bg-indigo-400 p-5 rounded m-3">
            <h2 class="text-2xl my-5 text-white uppercase font-bold text-center">Contacta al Reclutador</h2>

            <form action="" method="post">
                <div class="mb-4">
                    <label for="nombre" class="block text-white text-sm font-bold mb-4">
                        Nombre:
                    </label>
                    <input type="text"
                        id="nombre"
                        class="p-3 bg-gray-100 rounded form-input w-full @error('nombre')
                            border border-red-500
                        @enderror"
                        name="nombre"
                        placeholder="Tu nombre"
                        value="{{ old('nombre') }}"
                    />

                    @error('nombre')
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-white text-sm font-bold mb-4">
                        Email:
                    </label>
                    <input type="email"
                        id="email"
                        class="p-3 bg-gray-100 rounded form-input w-full @error('email')
                            border border-red-500
                        @enderror"
                        name="email"
                        placeholder="Tu email"
                        value="{{ old('email') }}"
                    />

                    @error('email')
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
            </form>
        </aside>
        
    </div>
@endsection