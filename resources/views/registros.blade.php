<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros Disponibles para Ver</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 font-sans">

<div class="container mx-auto p-8">

    <h1 class="text-4xl font-bold mb-8">VER REGISTROS GUARDADOS</h1>

    <div class="space-y-4">
        <div class="hidden sm:block">
            <a href="{{ route('verRegistroTrabajadores') }}" class="btn">Personal</a>
        </div>
        <div class="hidden sm:block">
            <a href="{{ route('verRegistroDepartamentos') }}" class="btn">Departamentos</a>
        </div>
        <div class="hidden sm:block">
            <a href="{{ route('verRegistroPlazas') }}" class="btn">Plazas</a>
        </div>
        <div class="hidden sm:block">
            <a href="{{ route('verRoles') }}" class="btn">Roles</a>
        </div>
    </div>

    <div class="mt-5">
        <x-primary-button>
            <a href="{{ route('dashboard') }}">{{ __('Regresar') }}</a>
        </x-primary-button>
    </div>
</div>

</body>
</html>
