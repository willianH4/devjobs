<aside class="md:w-2/5 bg-indigo-400 p-5 rounded m-3">
    <h2 class="text-2xl my-5 text-white uppercase font-bold text-center">Contacta al Reclutador</h2>

    <form action="{{ route('candidatos.store') }}" method="post" enctype="multipart/form-data">
        @csrf
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

        <div class="mb-4">
            <label for="cv" class="block text-white text-sm font-bold mb-4">
                Curriculum (PDF):
            </label>
            <input type="file"
                id="cv"
                class="p-3 rounded form-input w-full @error('cv')
                    border border-red-500
                @enderror"
                name="cv"
                accept="application/pdf"
            />

            @error('cv')
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                    <p>{{ $message }}</p>
                </div>
            @enderror
        </div>

        <input type="hidden" name="vacante_id" value="{{ $vacante->id }}">

        <input type="submit" value="Contactar"
        class="bg-indigo-600 w-full hover:bg-indigo-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase"
        >

    </form>
</aside>