<x-guest-layout>
    
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Rol') }}
        </h2>
    

    <form method="POST" action="{{ route('registrarRol') }}">
        @csrf

        <!-- Nombre -->
        <div class="mt-4">
            <x-input-label for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>

        <!-- Descripción -->
        <div class="mt-4">
            <x-input-label for="descripcion" :value="__('Descripción')" />
            <x-text-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" :value="old('descripcion')" />
            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
        </div>

        <!-- Botón de Registro -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Registrar Rol') }}
            </x-primary-button>
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                <a href="{{ route('dashboard') }}">{{ __('Regresar') }}</a>
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
