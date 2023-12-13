<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Registros de Plazas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="container mx-auto mt-10 p-4">
        <h2 class="text-2xl font-semibold mb-4">Lista de Registros de Plazas</h2>
        
        <div class="flex items-center mb-4">
            <label for="buscarInput" class="mr-2">Buscar:</label>
            <select id="campoBusqueda" class="p-2 border rounded mr-2">
                <option value="0">ID</option>
                <option value="3">Categoría</option>
                <option value="6">Tipo de categoria</option>
                <option value="7">Plaza Completa</option>
            </select>
            <input type="text" id="buscarInput" oninput="filtrarTabla()" class="p-2 border rounded">
        </div>
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <div class="shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table  id="tablaPlazas"  class="min-w-full bg-white">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                                ID
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                                Índice
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                                Subíndice
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                                Categoría
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                                Horas
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                                Plaza
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                                Tipo de Categoría
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                                Plaza Completa
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-black uppercase tracking-wider">
                                Fecha de Creación
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plazas as $plaza)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $plaza->id_plaza }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $plaza->indice }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $plaza->subindice }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $plaza->categoria }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $plaza->horas }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $plaza->plaza }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $plaza->tipoCategoria }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $plaza->plazaCompleta }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $plaza->created_at }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
            <a href = "{{route('registrarPlazas')}}">{{ __('Registrar Nueva Plaza') }}</a>
            </x-primary-button>
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                <a href="{{ route('dashboard') }}">{{ __('Regresar a seccion principal') }}</a>
            </x-primary-button>
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
            <a href = "{{route('registros')}}">{{ __('Regresar a Ver Registros Guardados') }}</bu</a>
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
        var tabla = document.getElementById("tablaPlazas");
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
</body>
</html>

