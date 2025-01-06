<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Publicación</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body class="font-inter bg-gray-50">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 h-full bg-gray-900 text-white p-5 space-y-6">
            <x-side-menu />
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col bg-gray-100 lg:pl-64 pl-0">
            <!-- Header -->
            <div class="flex items-center">
                <x-profile />
            </div>

            <main class="p-8 space-y-6 bg-gray-50">
                <!-- Formulario Principal -->
                <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-lg grid grid-cols-1 md:grid-cols-2 gap-8">
                    <h1 class="text-3xl font-semibold text-gray-800 mb-6 col-span-2 text-center">Crear Publicación</h1>

                    <!-- Formulario -->
                    <form action="{{ route('publications.store') }}" method="POST" enctype="multipart/form-data" class="col-span-2">
                        @csrf

                        <!-- Título -->
                        <div class="mb-6">
                            <label for="title" class="block text-gray-700 font-medium">Título</label>
                            <input type="text" name="title" id="title"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Ingresa el título de la publicación" required>
                        </div>

                        <!-- Contenido -->
                        <div class="mb-6">
                            <label for="content" class="block text-gray-700 font-medium">Contenido</label>
                            <textarea name="content" id="content" class="summernote w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required
                                placeholder="Escribe el contenido de la publicación"></textarea>
                        </div>

                        <!-- Fecha de Publicación -->
                        <div class="mb-6">
                            <label for="fecha_publicacion" class="block text-gray-700 font-medium">Fecha de Publicación</label>
                            <input type="datetime-local" name="fecha_publicacion" id="fecha_publicacion"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Estado -->
                        <div class="mb-6">
                            <label for="estado" class="block text-gray-700 font-medium">Estado</label>
                            <select name="estado" id="estado" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="borrador">Borrador</option>
                                <option value="publicado">Publicado</option>
                                <option value="programado">Programado</option>
                            </select>
                        </div>

                        <!-- Categoría -->
                        <div class="mb-6">
                            <label for="categoria" class="block text-gray-700 font-medium">Categoría</label>
                            <input type="text" name="categoria" id="categoria"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required
                                placeholder="Ingresa la categoría de la publicación">
                        </div>

                        <!-- Imagen -->
                        <div class="mb-6">
                            <label for="image" class="block text-gray-700 font-medium">Imagen</label>
                            <input type="file" name="image" id="image"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Botón de Enviar -->
                        <div class="mb-6">
                            <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                                Crear Publicación
                            </button>
                        </div>
                    </form>
                </div>
            </main>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300
            });
        });
    </script>
</body>

</html>
