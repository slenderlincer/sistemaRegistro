<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Asignación') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('asignarDepartamento') }}">
        @csrf

        <!-- Departamento -->
        <div class="mt-4">
            <x-input-label for="departamento" :value="__('Departamento')" />
            <select id="departamento" name="id_departamento" class="block mt-1 w-full" required>
                @foreach($departamentos as $departamento)
                <option value="{{ $departamento->id_departamentos }}">{{ $departamento->tipoDepartamento }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('id_departamento')" class="mt-2" />
        </div>

        <!-- Número de Tarjeta -->
        <div class="mt-4">
            <x-input-label for="numeroTarjeta" :value="__('Número de Tarjeta')" />
            <x-text-input id="numeroTarjeta" class="block mt-1 w-full" type="Number" name="numeroTarjeta" :value="$trabajador->numeroTarjeta ?? old('numeroTarjeta')" required/>
            <x-input-error :messages="$errors->get('numeroTarjeta')" class="mt-2" />
        </div>

        <!-- Cargo -->
        <div class="mt-4">
            <x-input-label for="cargo" :value="__('Cargo')" />
            <x-text-input id="cargo" class="block mt-1 w-full" type="text" name="cargo" :value="old('cargo')" required />
            <x-input-error :messages="$errors->get('cargo')" class="mt-2" />
        </div>

        <!-- Nombre -->
        <div class="mt-4">
            <x-input-label for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="$trabajador->NombreCompleto ?? old('nombre')" required />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>
        
        <!-- Correo -->
        <div class="mt-4">
            <x-input-label for="correo" :value="__('Correo')" />
            <x-text-input id="correo" class="block mt-1 w-full" type="email" name="correo" :value="$trabajador->Correo ?? old('correo')" required />
            <x-input-error :messages="$errors->get('correo')" class="mt-2" />
        </div>

        <!-- Extensión -->
        <div class="mt-4">
            <x-input-label for="extension" :value="__('Extensión')" />
            <x-text-input id="extension" class="block mt-1 w-full" type="number" name="extension" :value="old('extension')" />
            <x-input-error :messages="$errors->get('extension')" class="mt-2" />
        </div>

         <!-- Campo oculto para almacenar el ID de la asignación -->
        <input type="hidden" name="id_asignacion" value="{{ request('id_asignacion') }}" />
        <!-- Campo oculto para almacenar el ID del trabajador al que se le esta asignando el departamento -->
       
        <!-- Botón de Registro -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Registrar Asignación') }}
            </x-primary-button>
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                <a href="{{ route('dashboard') }}">{{ __('Regresar') }}</a>
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
