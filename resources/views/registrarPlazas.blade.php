<x-guest-layout>
    
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Plaza') }}
        </h2>
   

    <form method="POST" action="{{ route('registrarPlazas') }}">
        @csrf

        <!-- Índice -->
        <div class="mt-4">
            <x-input-label for="indice" :value="__('Índice')" />
            <x-text-input id="indice" class="block mt-1 w-full" type="number" name="indice" :value="old('indice')" required autofocus />
            <x-input-error :messages="$errors->get('indice')" class="mt-2" />
        </div>

        <!-- Subíndice -->
        <div class="mt-4">
            <x-input-label for="subindice" :value="__('Subíndice')" />
            <x-text-input id="subindice" class="block mt-1 w-full" type="number" name="subindice" :value="old('subindice')" required />
            <x-input-error :messages="$errors->get('subindice')" class="mt-2" />
        </div>

        <!-- Categoría -->
        <div class="mt-4">
            <x-input-label for="categoria" :value="__('Categoría')" />
            <x-text-input id="categoria" class="block mt-1 w-full" type="text" name="categoria" :value="old('categoria')" required />
            <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
        </div>

        <!-- Horas -->
        <div class="mt-4">
            <x-input-label for="horas" :value="__('Horas')" />
            <x-text-input id="horas" class="block mt-1 w-full" type="number" name="horas" :value="old('horas')" required />
            <x-input-error :messages="$errors->get('horas')" class="mt-2" />
        </div>

        <!-- Plaza -->
        <div class="mt-4">
            <x-input-label for="plaza" :value="__('Plaza')" />
            <x-text-input id="plaza" class="block mt-1 w-full" type="number" name="plaza" :value="old('plaza')" required />
            <x-input-error :messages="$errors->get('plaza')" class="mt-2" />
        </div>

        <!-- Tipo de Categoría -->
        <div class="mt-4">
            <x-input-label for="tipoCategoria" :value="__('Tipo de Categoría')" />
            <x-text-input id="tipoCategoria" class="block mt-1 w-full" type="text" name="tipoCategoria" :value="old('tipoCategoria')" required />
            <x-input-error :messages="$errors->get('tipoCategoria')" class="mt-2" />
        </div>

        <!-- Botón de Registro -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Registrar Plaza') }}
            </x-primary-button>
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                <a href="{{ route('dashboard') }}">{{ __('Regresar') }}</a>
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
