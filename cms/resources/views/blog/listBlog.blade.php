<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>

    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Favicon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body class="font-inter bg-gray-50">

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Publicaciones</h1>

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
                        <td class="border px-4 py-2">{{ $publication->created_at->format('d/m/Y H:i') }}</td>
                        <td class="border px-4 py-2">
                            @if ($publication->publication_date)
                                {{ $publication->publication_date->format('d/m/Y H:i') }}
                            @else
                                No programada
                            @endif
                        </td>
                        <td class="border px-4 py-2">{{ $publication->category }}</td>
                        <td class="border px-4 py-2">
                            @switch($publication->status)
                                @case('draft')
                                    Borrador
                                @break

                                @case('published')
                                    Publicado
                                @break

                                @case('scheduled')
                                    Programado
                                @break
                            @endswitch
                        </td>
                        <td class="border px-4 py-2 flex space-x-2">
                            <a href="{{ route('publications.edit', $publication->id) }}"
                                class="text-blue-500 hover:text-blue-700">Editar</a>
                            <form action="{{ route('publications.destroy', $publication->id) }}" method="POST"
                                class="inline-block">
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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
</body>

</html>
