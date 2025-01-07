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
        <!-- Sidebar -->
        <div class="w-64 h-full bg-gray-900 text-white p-5 space-y-6">
            <x-side-menu />
        </div>

        <!-- Main content -->
        <div class="flex-1 flex flex-col">
            @auth
            <!-- Profile Section -->
            <div class="flex items-center space-x-4 mb-12">
                <x-profile />
            </div>

            <!-- Page List Section -->
            <div class="container mx-auto p-6">
                <h1 class="text-3xl font-bold mb-6">Páginas</h1>

                <!-- Button to Create New Page -->
                <div class="mb-6">
                    <a href="{{ route('pages.create') }}" class="bg-indigo-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-indigo-700 transition duration-200">Nueva Página</a>
                </div>

                <!-- Pages Table -->
                <div class="overflow-x-auto bg-white shadow-lg rounded-lg border-t-4 border-indigo-500">
                    <table class="min-w-full table-auto">
                        <thead class="bg-indigo-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Título</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Slug</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Estado</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @foreach ($pages as $page)
                            <tr class="border-t border-gray-200 hover:bg-gray-100">
                                <td class="px-4 py-3">{{ $page->title }}</td>
                                <td class="px-4 py-3">{{ $page->slug }}</td>
                                <td class="px-4 py-3">{{ $page->status }}</td>
                                <td class="px-4 py-3 flex space-x-2">
                                    <a href="{{ route('pages.show', $page->id) }}" class="text-green-600 hover:text-green-800 transition duration-200">Vista</a>
                                    <a href="{{ route('pages.edit', $page->id) }}" class="text-blue-600 hover:text-blue-800 transition duration-200">Editar</a>
                                    <form action="{{ route('pages.destroy', $page->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 transition duration-200">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endauth
        </div>
    </div>
</body>

</html>
