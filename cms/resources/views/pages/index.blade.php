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
                <h1 class="text-3xl font-bold mb-6">Lista de Páginas</h1>

                <!-- Filtro y Botón de Nueva Página -->
                <div class="flex items-center justify-between mb-6">
                    <!-- Filtro por Estado -->
                    <form method="GET" class="flex items-center">
                        <label for="status" class="text-lg font-medium text-gray-700 mr-3">Filtrar por Estado:</label>
                        <select name="status" id="status" class="px-4 py-2 border rounded-lg" onchange="this.form.submit()">
                            <option value="all" {{ $status === 'all' ? 'selected' : '' }}>Todos</option>
                            <option value="draft" {{ $status === 'draft' ? 'selected' : '' }}>Borrador</option>
                            <option value="published" {{ $status === 'published' ? 'selected' : '' }}>Publicado</option>
                            <option value="archived" {{ $status === 'archived' ? 'selected' : '' }}>Archivado</option>
                        </select>
                    </form>

                    <!-- Botón Nueva Página -->
                    <a href="{{ route('pages.create') }}" class="bg-indigo-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-indigo-700 transition duration-200">
                        Nueva Página
                    </a>
                </div>

                <!-- Tabla de Páginas -->
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
                            @forelse ($pages as $page)
                            <tr class="border-t border-gray-200 hover:bg-gray-100">
                                <td class="px-4 py-3">{{ $page->title }}</td>
                                <td class="px-4 py-3">{{ $page->slug }}</td>
                                <td class="px-4 py-3">{{ ucfirst($page->status) }}</td>
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
                            @empty
                            <tr>
                                <td colspan="4" class="px-4 py-3 text-center text-gray-500">No hay páginas disponibles.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="mt-6">
                    {{ $pages->appends(['status' => $status])->links() }}
                </div>
            </div>
            @endauth
        </div>
    </div>
</body>

</html>
