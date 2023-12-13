<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Registros de Trabajadores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="font-sans antialiased bg-gray-100">

<div class="container mx-auto mt-10 p-4">
    <h2 class="text-2xl font-semibold mb-4">Lista de Registros de Trabajadores</h2>

    <div class="flex items-center mb-4">
        <label for="buscarInput" class="mr-2">Buscar:</label>
        <select id="campoBusqueda" class="p-2 border rounded mr-2">
            <option value="0">Número de Tarjeta</option>
            <option value="1">Nombre</option>
            <option value="2">Apellido Paterno</option>
            <option value="3">Apellido Materno</option>
            <!-- Agrega más opciones según los campos de tu base de datos -->
        </select>
        <input type="text" id="buscarInput" oninput="filtrarTabla()" class="p-2 border rounded">
    </div>

    @if (session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto">
        <div >
            <table id="tablaTrabajadores" class="min-w-full bg-white">
                <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                        Número de Tarjeta
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                        Nombre
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                        Apellido Paterno
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                        Apellido Materno
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                        Nombre Completo
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                        RFC
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                        CURP
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                        Correo
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                        Teléfono
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                        Sexo
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                        Fecha de Nacimiento
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                        Antigüedad
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                        Grado
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                        ID Plaza
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                        ID Rol
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                        Cargo Asignado
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                        Departamento Asignado
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                        Discapacidad
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                        Sistema
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                        Posgrado
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                        Dedicación
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                        Fecha de Creación
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                        Acciones
                    </th>
                    <!-- Agrega más columnas según los campos de tu base de datos -->
                </tr>
            </thead>
            <tbody>
                @foreach ($trabajadores as $trabajador)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        {{ $trabajador->numeroTarjeta }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        {{ $trabajador->Nombre }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        {{ $trabajador->ApellidoPaterno }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        {{ $trabajador->ApellidoMaterno }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        {{ $trabajador->NombreCompleto }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        {{ $trabajador->RFC }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        {{ $trabajador->CURP }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        {{ $trabajador->Correo }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        {{ $trabajador->telefono }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        {{ $trabajador->Sexo }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        {{ $trabajador->fecha_nacimiento }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        {{ $trabajador->Antiguedad }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        {{ $trabajador->Grado }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        {{ $trabajador->plaza->tipoCategoria }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        {{ $trabajador->rol->nombre }}
                    </td>
                    <!-- Dentro de tu bucle foreach en la vista -->
<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
    @if ($trabajador->asignacion)
        {{ $trabajador->asignacion->cargo }}
    @else
        Sin asignación
    @endif
</td>
<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
    @if ($trabajador->asignacion)
        {{ $trabajador->asignacion->departamento->tipoDepartamento }}
    @else
        Sin asignación
    @endif
</td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        {{ $trabajador->Discapacidad }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        {{ $trabajador->Sistema }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        {{ $trabajador->Posgrado }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        {{ $trabajador->Dedicacion }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        {{ $trabajador->created_at }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <!-- Enlace para asignar departamento -->
                        <a href="{{ route('asignarDepartamento.trabajador', ['numeroTarjeta' => $trabajador->numeroTarjeta]) }}" class="text-green-500 hover:text-green-700">Asignar Departamento</a>
                        <a href="{{ route('editarTrabajador', ['numeroTarjeta' => $trabajador->numeroTarjeta]) }}" class="text-blue-500 hover:text-blue-700">Editar</a>
                        <a href="{{ route('eliminarTrabajador', ['numeroTarjeta' => $trabajador->numeroTarjeta]) }}" class="text-red-500 hover:text-red-700" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                    </td>
                    <!-- Agrega más celdas según los campos de tu base de datos -->
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-primary-button>
            <a href="{{ route('registrarPersonal') }}">{{ __('Registrar Nuevo Trabajador') }}</a>
        </x-primary-button>
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-primary-button>
            <a href="{{ route('dashboard') }}">{{ __('Regresar a sección principal') }}</a>
        </x-primary-button>
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-primary-button>
            <a href="{{ route('registros') }}">{{ __('Regresar a Ver Registros Guardados') }}</a>
        </x-primary-button>
    </div>
</div>

<script>
    // Función para filtrar los resultados de la tabla
    function filtrarTabla() {
        // Obtener el valor de búsqueda
        var input = document.getElementById("buscarInput");
        var filtro = input.value.toUpperCase();

        // Obtener las filas de la tabla
        var tabla = document.getElementById("tablaTrabajadores");
        var filas = tabla.getElementsByTagName("tr");

        // Obtener el índice de la columna seleccionada
        var indiceColumna = document.getElementById("campoBusqueda").value;

        // Iterar sobre las filas y mostrar u ocultar según el filtro
        for (var i = 1; i < filas.length; i++) {
            var mostrarFila = true; // Inicializar como true para mostrar todas las filas si no hay filtro

            if (filtro !== "") {
                var celda = filas[i].getElementsByTagName("td")[indiceColumna];

                // Verificar si el valor de la celda coincide con el filtro
                if (celda) {
                    var textoCelda = celda.textContent || celda.innerText;

                    if (textoCelda.toUpperCase().indexOf(filtro) === -1) {
                        mostrarFila = false;
                    }
                }
            }

            filas[i].style.display = mostrarFila ? "" : "none";
        }
    }

    // Escuchar el evento input en el campo de búsqueda
    document.getElementById("buscarInput").addEventListener("input", filtrarTabla);
    // Escuchar el evento change en el select de campo de búsqueda
    document.getElementById("campoBusqueda").addEventListener("change", filtrarTabla);
</script>

</body>
</html>
