<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Página</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
</head>

<body class="font-inter bg-gray-50">

    <div class="flex h-screen">
        <div class="w-64 h-full bg-gray-900 text-white p-5 space-y-6">
            <x-side-menu />
        </div>

        <div class="flex-1 flex flex-col">
            @auth
                <div class="flex items-center space-x-4 mb-12 p-4 bg-white shadow-md">
                    <x-profile />
                </div>
                <div class="container mx-auto p-6 bg-white rounded-lg shadow-lg">
                    <h1 class="text-3xl font-bold mb-4">Crear Página</h1>

                    @if (session('show_message'))
                        <x-mensaje :message="session('show_message')" />
                        @php
                            session()->forget('show_message');
                        @endphp
                    @endif

                    <form action="{{ route('pages.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="title" class="block text-gray-700">Título</label>
                            <input type="text" name="title" id="title" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>

                        <div class="mb-4">
                            <label for="slug" class="block text-gray-700">Slug</label>
                            <input type="text" name="slug" id="slug" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-gray-700">Contenido</label>
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block text-gray-700">Estado</label>
                            <select name="status" id="status" class="w-full px-4 py-2 border rounded-lg" required>
                                <option value="draft">Borrador</option>
                                <option value="published">Publicado</option>
                                <option value="archived">Archivado</option>
                            </select>
                        </div>

                        <div class="mb-4 flex space-x-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Crear Página</button>
                            <a href="{{ route('pages.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg">Volver a la lista</a>
                        </div>
                    </form>
                </div>
            @endauth
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

</body>

</html>
