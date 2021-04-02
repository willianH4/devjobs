@extends('layouts.app')

{{-- llamado a la hoja de estilos agregada en app.blade.php --}}
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw==" crossorigin="anonymous" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.1/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" />
@endsection

@section('navegacion')
   @include('ui.admin_nav')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Nueva Vacante</h1>

    <form class="max-w-lg mx-auto my-10" action="{{ route('vacantes.store') }}" method="post">
        
        {{-- Token --}}
        @csrf

        <div class="mb-5">
            <label for="titulo" class="block text-gray-700 text-sm mb-2">Titulo de la vacante: </label>
            <input id="titulo" type="text" class="p-3 bg-white-300 rounded form-input w-full" name="titulo" placeholder="Titulo de la vacante"
            value="{{ old('titulo') }}"
            >

            @error('titulo')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="categoria" class="block text-gray-700 text-sm mb-2">Categoria de la vacante: </label>
            <select name="categoria" id="categoria"
            class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full"
            >
        <option value="" disabled selected>-- Selecciona --</option>
        @foreach ($categorias as $categoria)
            <option 
            {{ old('categoria') == $categoria->id ? 'selected' : '' }}
            value="{{ $categoria->id }}">
                {{ $categoria->nombre }}
            </option>
        @endforeach
        </select>

        @error('categoria')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block">{{ $message }}</span>
        </div>
        @enderror

        </div>

        <div class="mb-5">
            <label for="experiencia" class="block text-gray-700 text-sm mb-2">Experiencia requerida en la vacante: </label>
            <select name="experiencia" id="experiencia"
            class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full"
            >
        <option value="" disabled selected>-- Selecciona --</option>
        @foreach ($experiencias as $experiencia)
            <option 
            {{ old('experiencia') == $experiencia->id ? 'selected' : '' }}
            value="{{ $experiencia->id }}">
                {{ $experiencia->nombre }}
            </option>
        @endforeach
        </select>

        @error('categoria')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block">{{ $message }}</span>
        </div>
        @enderror

        </div>

        <div class="mb-5">
            <label for="ubicacion" class="block text-gray-700 text-sm mb-2">Ubicacion de la vacante: </label>
            <select name="ubicacion" id="ubicacion"
            class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full"
            >
        <option value="" disabled selected>-- Selecciona --</option>
        @foreach ($ubicaciones as $ubicacion)
            <option 
            {{ old('ubicacion') == $ubicacion->id ? 'selected' : '' }}
            value="{{ $ubicacion->id }}">
                {{ $ubicacion->nombre }}
            </option>
        @endforeach
        </select>

        @error('ubicacion')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block">{{ $message }}</span>
        </div>
        @enderror

        </div>

        <div class="mb-5">
            <label for="salario" class="block text-gray-700 text-sm mb-2">Salario de la vacante: </label>
            <select name="salario" id="salario"
            class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full"
            >
        <option value="" disabled selected>-- Selecciona --</option>
        @foreach ($salarios as $salario)
            <option 
            {{ old('salario') == $salario->id ? 'selected' : '' }}
            value="{{ $salario->id }}">
                {{ $salario->nombre }}
            </option>
        @endforeach
        </select>

        @error('salario')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block">{{ $message }}</span>
        </div>
        @enderror

        </div>

        <div class="mb-5">
            <label for="descripcion" class="block text-gray-700 text-sm mb-2">Descripcion de la vacante: </label>
            {{-- instancia de medium editor --}}
            <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700">
            </div>
            <input type="hidden" name="descripcion" 
            id="descripcion" value="{{ old('descripcion') }}">

            @error('descripcion')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block">{{ $message }}</span>
            </div>
            @enderror
        </div>
        
        <div class="mb-5">
            <label for="descripcion" class="block text-gray-700 text-sm mb-2">Imagen de la vacante: </label>
            {{-- instancia de medium editor --}}
            <div id="dropzoneDev" class="dropzone rounded bg-gray-100">
            </div>
            <input type="hidden" name="imagen" value="{{ old('imagen') }}" class="imagen" id="imagen">

            @error('imagen')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block">{{ $message }}</span>
            </div>
            @enderror

            <p class="error"></p>
        </div>

        <div class="mb-5">
            <label for="descripcion" class="block text-gray-700 text-sm mb-5">Habilidades requeridas: <span class="text-xs">( Elige al menos 3 )</span></label>

            @php
                $skills = ['HTML5', 'CSS3', 'Flexbox', 'JavaScript', 'VueJS', 'ReactJS', 'JAVA', 'C#', '.NetCore', 'PHP', 'Laravel', 'NodeJS', 'Ruby on Rail', 'Kotlin', 'MySql', 'SQL Server']
            @endphp
            <list-skills
                :skills = "{{ json_encode($skills) }}"
                :oldskills = "{{ json_encode( old('skills') ) }}"
            ></list-skills>

            @error('skills')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block">{{ $message }}</span>
            </div>
            @enderror

        </div>

        <button type="submit" class="bg-indigo-500 w-full hover:bg-indigo-600 text-gray-100 font-bold p-3 focus:outline focus:shadow-outline uppercase rounded">Publicar vacante
        </button>
    </form>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA==" crossorigin="anonymous"></script>

{{-- dopzone para subir archivos --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.1/min/dropzone.min.js" integrity="sha512-OTNPkaN+JCQg2dj6Ht+yuHRHDwsq1WYsU6H0jDYHou/2ZayS2KXCfL28s/p11L0+GSppfPOqwbda47Q97pDP9Q==" crossorigin="anonymous"></script>

<script>
    Dropzone.autoDiscover = false;
    // Integrando medium editor
    document.addEventListener('DOMContentLoaded', () => {
        // medium editor
        const editor = new MediumEditor('.editable', {
            toolbar: {
                buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft', 'justifyCenter', 'justifyRigth', 'justifyFull', 'orderedList', 'unorderedList', 'h2', 'h3'],
                static: true,
                sticky: true
            },
            placeholder: {
                text: 'Informacion de la vacante'
            }
        });

        editor.subscribe('editableInput', function(eventObj, editable) {
            const contenido = editor.getContent();
            document.querySelector('#descripcion').value = contenido;
        })

        // Llena el editor con el contenido del iput hidden
        editor.setContent( document.querySelector('#descripcion').value );

        // Dropzone libreria para cargar imagenes al servidor
        const dropzoneDev = new Dropzone('#dropzoneDev', {
            url: "/vacantes/imagen",
            dictDefaultMessage: 'Sube aqui tu archivo',
            acceptedFiles: '.png, .jpg, .jpeg, .gif',
            addRemoveLinks: true,
            dictRemoveFile: 'Borrar Archivo',
            maxFiles: 1,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
            },

            init: function() {
                if (document.querySelector('#imagen').value.trim() ) {
                    let imagenPublicada = {};
                    imagenPublicada.size = 1234;
                    imagenPublicada.name = document.querySelector('#imagen').value;

                    this.options.addedfile.call(this, imagenPublicada);
                    this.options.thumbnail.call(this, imagenPublicada, `/storage/vacantes/${imagenPublicada.name}`);

                    imagenPublicada.previewElement.classList.add('dz-sucess');
                    imagenPublicada.previewElement.classList.add('dz-complete');
                }
            },

            success: function(file, response){
                // console.log(file);
                // console.log(response);
                console.log(response.correcto);
                document.querySelector(".error").textContent = '';

                // coloca la respuesta del controlador en el input
                document.querySelector("#imagen").value = response.correcto;
              
                // agrega al objeto de archivo el nombre del servidor
                file.nombreServidor = response.correcto;
            },
            // error: function(file, response){
            //     // console.log(response);
            //     // console.log(file);
            //     document.querySelector(".error").textContent = "Formato no valido";
            // },
            maxfilesexceeded: function(file) {
                //console.log(this.file) //aqui se guardan los archivos;
                if (this.files[1] != null) {
                    this.removeFile(this.files[0]); // Elimina el archivo anterior
                    this.addFile(file);
                }
            },
            removedfile: function(file, response) {
                file.previewElement.parentNode.removeChild(file.
                previewElement);
                
                params = {
                    imagen: file.nombreServidor ?? document.querySelector('#imagen').value
                }

                axios.post('/vacantes/borrarimagen', params)
                    .then(respuesta => console.log(respuesta))
            }
        });
    })
</script>
@endsection