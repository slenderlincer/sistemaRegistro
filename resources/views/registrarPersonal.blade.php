<x-guest-layout>
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($modoEdicion) && $modoEdicion ? 'Editar Trabajador' : 'Registrar Trabajador' }}
        </h2>


    <form method="POST" action="{{ isset($modoEdicion) ? route('actualizarTrabajador', ['numeroTarjeta' => $trabajador->numeroTarjeta]) : route('registrarTrabajadores') }}" id="registrar_trabajador_form">
        @csrf

        <!-- Numero de Tarjeta -->
        <div class="mt-4">
            <x-input-label for="numeroTarjeta" :value="__('Numero de Tarjeta')" />
            <x-text-input id="numeroTarjeta" class="block mt-1 w-full" type="number" name="numeroTarjeta" :value="isset($trabajador) ? $trabajador->numeroTarjeta : old('numeroTarjeta')" required />
            <x-input-error :messages="$errors->get('numeroTarjeta')" class="mt-2" />
        </div>

        <!-- Nombre -->
        <div class="mt-4">
            <x-input-label for="Nombre" :value="__('Nombre')" />
            <x-text-input id="Nombre" class="block mt-1 w-full" type="text" name="Nombre" :value="isset($trabajador) ? $trabajador->Nombre : old('Nombre')" required />
            <x-input-error :messages="$errors->get('Nombre')" class="mt-2" />
        </div>


        <!-- Apellido Paterno -->
        <div class="mt-4">
            <x-input-label for="ApellidoPaterno" :value="__('Apellido Paterno')" />
            <x-text-input id="ApellidoPaterno" class="block mt-1 w-full" type="text" name="ApellidoPaterno" :value="isset($trabajador) ? $trabajador->ApellidoPaterno : old('ApellidoPaterno')" required />
            <x-input-error :messages="$errors->get('ApellidoPaterno')" class="mt-2" />
        </div>

        <!-- Apellido Materno -->
        <div class="mt-4">
            <x-input-label for="ApellidoMaterno" :value="__('Apellido Materno')" />
            <x-text-input id="ApellidoMaterno" class="block mt-1 w-full" type="text" name="ApellidoMaterno" :value="isset($trabajador) ? $trabajador->ApellidoMaterno : old('ApellidoMaterno')" required />
            <x-input-error :messages="$errors->get('ApellidoMaterno')" class="mt-2" />
        </div>

        <!-- Sexo -->
        <div class="mt-4">
            <x-input-label for="Sexo" :value="__('Sexo')" />
            <x-text-input id="Sexo" class="block mt-1 w-full" type="text" name="Sexo" :value=" isset($trabajador) ? $trabajador->Sexo : old('Sexo')" required />
            <x-input-error :messages="$errors->get('Sexo')" class="mt-2" />
        </div>

        <!-- Correo -->
        <div class="mt-4">
            <x-input-label for="Correo" :value="__('Correo')" />
            <x-text-input id="Correo" class="block mt-1 w-full" type="email" name="Correo" :value=" isset($trabajador) ? $trabajador->Correo : old('Correo')" required />
            <x-input-error :messages="$errors->get('Correo')" class="mt-2" />
        </div>

        <!-- RFC -->
        <div class="mt-4">
            <x-input-label for="RFC" :value="__('RFC')" />
            <x-text-input id="RFC" class="block mt-1 w-full" type="text" name="RFC" :value=" isset($trabajador) ? $trabajador->RFC : old('RFC') " required />
            <x-input-error :messages="$errors->get('RFC')" class="mt-2" />
        </div>

        <!-- CURP -->
        <div class="mt-4">
            <x-input-label for="CURP" :value="__('CURP')" />
            <x-text-input id="CURP" class="block mt-1 w-full" type="text" name="CURP" :value="isset($trabajador) ? $trabajador->CURP : old('CURP')" required />
            <x-input-error :messages="$errors->get('CURP')" class="mt-2" />
        </div>

        <!-- Telefono -->
        <div class="mt-4">
            <x-input-label for="Telefono" :value="__('Telefono')" />
            <x-text-input id="Telefono" class="block mt-1 w-full" type="number" name="Telefono" :value="isset($trabajador) ? $trabajador->telefono : old('Telefono')" required />
            <x-input-error :messages="$errors->get('Telefono')" class="mt-2" />
        </div>


        <!-- Fecha de nacimiento -->
        <div class="mt-4">
            <x-input-label for="fecha_nacimiento" :value="__('Fecha de Nacimiento')" />
            <x-text-input id="fecha_nacimiento" class="block mt-1 w-full" type="date" name="fecha_nacimiento" :value="isset($trabajador) ? $trabajador->fecha_nacimiento : old('fecha_nacimiento') " required />
            <x-input-error :messages="$errors->get('fecha_nacimiento')" class="mt-2" />
        </div>

        <!-- Antigüedad -->
        <div class="mt-4">
            <x-input-label for="Antiguedad" :value="__('Antigüedad')" />
            <x-text-input id="Antiguedad" class="block mt-1 w-full" type="number" name="Antiguedad" :value="isset($trabajador) ? $trabajador->Antiguedad : old('Antiguedad')" required />
            <x-input-error :messages="$errors->get('Antiguedad')" class="mt-2" />
        </div>

        <!-- Grado -->
        <div class="mt-4">
            <x-input-label for="Grado" :value="__('Grado')" />
            <x-text-input id="Grado" class="block mt-1 w-full" type="text" name="Grado" :value="isset($trabajador) ? $trabajador->Grado : old('Grado')" required />
            <x-input-error :messages="$errors->get('Grado')" class="mt-2" />
        </div>

        <!-- Plaza (id_plaza) -->
        <div class="mt-4">
            <x-input-label for="id_plaza" :value="__('Plaza')" />
            <select id="id_plaza" name="id_plaza" class="block mt-1 w-full">
                @foreach($plazas as $plaza)
                <option value="{{ $plaza->id_plaza }}" {{ (isset($trabajador) && $trabajador->id_plaza == $plaza->id_plaza) || old('id_plaza') == $plaza->id_plaza ? 'selected' : '' }}>
                    {{ $plaza->tipoCategoria }}
                </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('id_plaza')" class="mt-2" />
        </div>

        <!-- Rol (id_rol) -->
        <div class="mt-4">
            <x-input-label for="id_rol" :value="__('Tipo de empleado')" />
            <select id="id_rol" name="id_rol" class="block mt-1 w-full">
                @foreach($roles as $rol)
                <option value="{{ $rol->id }}" {{ (isset($trabajador) && $trabajador->id_rol == $rol->id) || old('id_rol') == $rol->id ? 'selected' : '' }}>
                    {{ $rol->nombre }}
                </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('id_rol')" class="mt-2" />
        </div>

        <!-- Discapacidad -->
        <div class="mt-4">
            <x-input-label for="Discapacidad" :value="__('Discapacidad')" />
            <x-text-input id="Discapacidad" class="block mt-1 w-full" type="text" name="Discapacidad" :value="isset($trabajador) ? $trabajador->Discapacidad : old('Discapacidad')" />
            <x-input-error :messages="$errors->get('Discapacidad')" class="mt-2" />
        </div>
        
        <!-- Sistema -->
        <div class="mt-4">
            <x-input-label for="Sistema" :value="__('Sistema')" />
            <x-text-input id="Sistema" class="block mt-1 w-full" type="text" name="Sistema" :value="isset($trabajador) ? $trabajador->Sistema : old('Sistema')" />
            <x-input-error :messages="$errors->get('Sistema')" class="mt-2" />
        </div>
        
        <!-- Posgrado -->
        <div class="mt-4">
            <x-input-label for="Posgrado" :value="__('Posgrado')" />
            <x-text-input id="Posgrado" class="block mt-1 w-full" type="text" name="Posgrado" :value="isset($trabajador) ? $trabajador->Posgrado : old('Posgrado')" />
            <x-input-error :messages="$errors->get('Posgrado')" class="mt-2" />
        </div>
        
        <!-- Dedicación -->
        <div class="mt-4">
            <x-input-label for="Dedicacion" :value="__('Dedicación')" />
            <x-text-input id="Dedicacion" class="block mt-1 w-full" type="text" name="Dedicacion" :value="isset($trabajador) ? $trabajador->Dedicacion : old('Dedicacion')" />
            <x-input-error :messages="$errors->get('Dedicacion')" class="mt-2" />
        </div>


        <!-- Botones de Registro y regresar al dashboard -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ isset($modoEdicion) ? 'Actualizar Trabajador' : 'Registrar Trabajador' }}
            </x-primary-button>
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                <a href="{{ route('dashboard') }}">{{ __('Regresar') }}</a>
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
