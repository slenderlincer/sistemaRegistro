<x-app-layout>
    <x-slot name="header">
        <h2 class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex font-semibold text-xl text-gray-800 leading-tight">
            {{ __('OPCIONES') }}
        </h2> 
    </x-slot>
    <x-slot name="opciones">
        <div class = "hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <a href = "{{route('registrarPersonal')}}"><button type = "button">Registrar Personal</button></a>
        </div>
        <div class = "hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <a href = "{{route('registrarPlazas')}}"><button type = "button">Registrar Plaza</button></a>
        </div>
        <div class = "hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <a href = "{{route('registrarDepartamentos')}}"><button type = "button">Registrar Departamento</button></a>
        </div>
        <div class = "hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <a href = "{{route('registrarRol')}}"><button type = "button">Crear un nuevo Rol</button></a>
        </div>
        <div class = "hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <a href = "{{route('registros')}}"><button type = "button">Ver Registros</button></a>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
