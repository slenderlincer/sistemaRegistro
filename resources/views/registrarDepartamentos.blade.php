<x-guest-layout>
    
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Departamento') }}
        </h2>
    

    <form method="POST" action="{{ route('registrarDepartamentos') }}">
        @csrf

        <!-- Tipo de Departamento -->
        <div>
            <x-input-label for="tipoDepartamento" :value="__('Tipo de Departamento')" />
            <x-text-input id="tipoDepartamento" class="block mt-1 w-full" type="text" name="tipoDepartamento" :value="old('tipoDepartamento')" required autofocus />
            <x-input-error :messages="$errors->get('tipoDepartamento')" class="mt-2" />
        </div>

        <!-- Botón de Registro -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Registrar Departamento') }}
            </x-primary-button>
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                <a href="{{ route('dashboard') }}">{{ __('Regresar') }}</a>
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
