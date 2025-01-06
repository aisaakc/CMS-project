<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Páginas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="font-inter bg-gray-50">
    <div class="flex h-screen">
        <div class="w-64 h-full bg-gray-900 text-white p-5 space-y-6">
            <x-side-menu />
        </div>

        <div class="flex-1 flex flex-col">
            @auth
                <div class="flex items-center space-x-4 mb-12">
                    <x-profile />
                </div>
                <div class="container mx-auto p-6">
                    <h1 class="text-3xl font-bold mb-4">Páginas</h1>

                    <div class="mb-4">
                        <a href="{{ route('pages.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Nueva Página</a>
                    </div>

                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2">Título</th>
                                <th class="px-4 py-2">Contenido</th>
                                <th class="px-4 py-2">Slug</th>
                                <th class="px-4 py-2">Estado</th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $page)
                                <tr>
                                    <td class="border px-4 py-2">{{ $page->title }}</td>
                                    <td class="border px-4 py-2">{{ $page->content}}</td>
                                    <td class="border px-4 py-2">{{ $page->slug }}</td>
                                    <td class="border px-4 py-2">{{ $page->status}}</td>
                                    <td class="border px-4 py-2 flex space-x-2">
                                        <a href="{{ route('pages.show', $page->id) }}" class="text-green-500 hover:text-green-700">Vista</a>
                                        <a href="{{ route('pages.edit', $page->id) }}" class="text-blue-500 hover:text-blue-700">Editar</a>
                                        <form action="{{ route('pages.destroy', $page->id) }}" method="POST" class="inline-block">
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
            @endauth
        </div>
    </div>
</body>

</html>
