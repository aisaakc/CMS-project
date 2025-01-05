<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<<<<<<< HEAD
=======
<x-mensaje />
>>>>>>> bd5f409339445445afd0ce0fa69b1efc79d96bd2

<body class="font-inter bg-gray-50">

    <div class="flex h-screen">
        <div class="w-64 h-full bg-gray-900 text-white transition-transform lg:block fixed">
            <x-side-menu />
        </div>

        <div class="flex-1 flex flex-col bg-gray-100 lg:pl-64 pl-0">
            <!-- Header -->
            <div class="h-14 text-white flex items-center justify-between z-20">
                <x-profile />
            </div>
            <div class="container mx-auto p-6">
                <h1 class="text-3xl font-bold mb-6 text-gray-800">Publicaciones</h1>

<<<<<<< HEAD
                <!-- Mostrar publicaciones por categorías -->
                @foreach ($publicationsByCategory as $category => $categoryPublications)
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">{{ $category }}</h2>
                    <div class="overflow-x-auto bg-white shadow-md rounded-lg border border-gray-200 mb-6">
                        <table class="min-w-full table-auto">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-semibold">Título</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold">Fecha de Creación</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold">Fecha de Publicación</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold">Estado</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($categoryPublications as $publication)
                                    <tr class="hover:bg-gray-50 transition duration-200 ease-in-out">
                                        <td class="px-6 py-4 text-sm text-gray-800">{{ $publication->title }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-800">
                                            {{ $publication->fecha_creacion ? $publication->fecha_creacion->format('Y-m-d H:i:s') : 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-800">
                                            @if ($publication->fecha_publicacion)
                                                {{ $publication->fecha_publicacion->format('d/m/Y H:i') }}
                                            @else
                                                No programada
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-800">
                                            @switch($publication->estado)
                                                @case('borrador')
                                                    <span class="px-2 py-1 text-xs font-semibold text-yellow-600 bg-yellow-100 rounded-full">Borrador</span>
                                                    @break

                                                @case('publicado')
                                                    <span class="px-2 py-1 text-xs font-semibold text-green-600 bg-green-100 rounded-full">Publicado</span>
                                                    @break
=======
                <div class="mb-4">
                    <a href="{{ route('publications.create') }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg">Nueva Publicación</a>
                </div>

                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2">Título</th>
                            <th class="px-4 py-2">Fecha de Creación</th>
                            <th class="px-4 py-2">Fecha de Publicación</th>
                            <th class="px-4 py-2">Categoría</th>
                            <th class="px-4 py-2">Estado</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($publications as $publication)
                            <tr>
                                <td class="border px-4 py-2">{{ $publication->title }}</td>
                                <td class="border px-4 py-2">
                                    {{ $publication->fecha_creacion ? $publication->fecha_creacion->format('Y-m-d H:i:s') : 'N/A' }}
                                </td>
                                <td class="border px-4 py-2">
                                    @if ($publication->fecha_publicacion)
                                        {{ $publication->fecha_publicacion->format('d/m/Y H:i') }}
                                    @else
                                        No programada
                                    @endif
                                </td>
                                <td class="border px-4 py-2">{{ $publication->categoria }}</td>
                                <td class="border px-4 py-2">
                                    @switch($publication->estado)
                                        @case('borrador')
                                            Borrador
                                        @break
>>>>>>> bd5f409339445445afd0ce0fa69b1efc79d96bd2

                                                @case('programado')
                                                    <span class="px-2 py-1 text-xs font-semibold text-blue-600 bg-blue-100 rounded-full">Programado</span>
                                                    @break
                                            @endswitch
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-800 flex space-x-4">
                                            <a href="{{ route('publications.edit', ['id' => $publication->idpublications]) }}"
                                               class="text-blue-500 hover:text-blue-700 transition duration-200">Editar</a>

<<<<<<< HEAD
                                            <form action="{{ route('publications.destroy', ['id' => $publication->idpublications]) }}"
                                                  method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-red-500 hover:text-red-700 transition duration-200">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach

                <!-- Paginación -->
                <div class="mt-6">
                    <div class="flex justify-center">
                        <!-- Mostrar la paginación de publicaciones -->
                        {{ $publications->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
=======
                                        @case('programado')
                                            Programado
                                        @break
                                    @endswitch
                                </td>
                                <td class="border px-4 py-2 flex space-x-2">
                                    <a href="{{ route('publications.show', ['id' => $publication->idpublications]) }}"
                                        class="text-green-500 hover:text-green-700">Vista</a>
                                    <a href="{{ route('publications.edit', ['id' => $publication->idpublications]) }}"
                                        class="text-blue-500 hover:text-blue-700">Editar</a>
                                    <form
                                        action="{{ route('publications.destroy', ['id' => $publication->idpublications]) }}"
                                        method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
>>>>>>> bd5f409339445445afd0ce0fa69b1efc79d96bd2
</body>

</html>
