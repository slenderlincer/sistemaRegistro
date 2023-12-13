<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignaciones del Departamento</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="font-sans antialiased bg-gray-100">
    
    <div class="container mx-auto mt-10 p-4">
    <h2 class="text-2xl font-semibold mb-4">
    {{ $titulo }}
        </h2>

        <div class="flex items-center mb-4">
            <label for="buscarInput" class="mr-2">Buscar:</label>
            <select id="campoBusqueda" class="p-2 border rounded mr-2">
                <option value="0">ID Asignación</option>
                <option value="1">Cargo</option>
                <option value="2">Nombre</option>
                <option value="3">Correo</option>
                <option value="4">Extensión</option>
                <option value="5">Fecha de Creación</option>
            </select>
            <input type="text" id="buscarInput" oninput="filtrarTabla()" class="p-2 border rounded">
        </div>

        @if($asignaciones->isEmpty())
            <p class="text-gray-600">No hay asignaciones para este departamento.</p>
        @else
            <div class="overflow-x-auto">
                <div class="shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table id="tablaAsignaciones" class="min-w-full bg-white">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                                    ID Asignación
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                                    Cargo
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                                    Correo
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                                    Extensión
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                                    Fecha de Creación
                                </th>
                                <!-- Agrega más columnas según sea necesario -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($asignaciones as $asignacion)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ $asignacion->id_asignacion }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ $asignacion->cargo }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ $asignacion->nombre }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ $asignacion->correo }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ $asignacion->extension }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ $asignacion->created_at }}
                                    </td>
                                    <!-- Agrega más celdas según sea necesario -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                <a href="{{ route('dashboard') }}">{{ __('Regresar a sección principal') }}</a>
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
            var tabla = document.getElementById("tablaAsignaciones");
            var filas = tabla.getElementsByTagName("tr");

            // Obtener el índice de la columna seleccionada
            var indiceColumna = parseInt(document.getElementById("campoBusqueda").value);

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
