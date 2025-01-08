<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Página</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
</head>
<body class="font-inter bg-gray-50 min-h-screen flex">

    <!-- Sidebar -->
    <div class="w-64 h-full bg-gray-900 text-white p-5 space-y-6">
        <x-side-menu />
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Profile Section -->
        <div class="flex items-center space-x-4 mb-12">
            <x-profile />
        </div>

        <!-- Form Section -->
        <div class="container mx-auto p-8 bg-white shadow-md rounded-lg max-w-3xl">
            <h1 class="text-4xl font-extrabold text-gray-800 mb-6 border-b pb-4">Editar Página</h1>

            <form action="{{ route('pages.update', $page->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div>
                    <label for="title" class="block text-lg font-medium text-gray-700 mb-2">Título</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        value="{{ $page->title }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-700"
                        placeholder="Ingresa el título de la página"
                        >
                </div>

                <div>
                    <label for="slug" class="block text-lg font-medium text-gray-700 mb-2">Slug</label>
                    <input
                        type="text"
                        name="slug"
                        id="slug"
                        value="{{ $page->slug }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-700"
                        placeholder="Ingresa el slug"
                        >
                </div>

                <!-- Content -->
                <div>
                    <label for="content" class="block text-lg font-medium text-gray-700 mb-2">Contenido</label>
                    <textarea
                        name="content"
                        id="content"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-700"
                        placeholder="Escribe el contenido de la página"
                        >{{ $page->content }}</textarea>
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-lg font-medium text-gray-700 mb-2">Estado</label>
                    <select
                        name="status"
                        id="status"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-700"
                        >
                        <option value="draft" {{ $page->status == 'draft' ? 'selected' : '' }}>Borrador</option>
                        <option value="published" {{ $page->status == 'published' ? 'selected' : '' }}>Publicado</option>
                        <option value="archived" {{ $page->status == 'archived' ? 'selected' : '' }}>Archivado</option>
                    </select>
                </div>

                <!-- Actions -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('pages.index') }}"
                       class="px-6 py-3 text-gray-700 bg-gray-200 rounded-lg shadow-sm hover:bg-gray-300 hover:text-gray-900">
                        Cancelar
                    </a>
                    <button
                        type="submit"
                        class="px-6 py-3 text-white bg-blue-600 rounded-lg shadow-sm hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">
                        Actualizar Página
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
