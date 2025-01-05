# filepath: /c:/Users/user/Desktop/CMS-project/cms/resources/views/pages/create.blade.php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Página</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="font-inter bg-gray-50">

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Crear Página</h1>

        <form action="{{ route('pages.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-gray-700">Título</label>
                <input type="text" name="title" id="title" class="w-full px-4 py-2 border rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="content" class="block text-gray-700">Contenido</label>
                <textarea name="content" id="content" class="w-full px-4 py-2 border rounded-lg" required></textarea>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700">Estado</label>
                <select name="status" id="status" class="w-full px-4 py-2 border rounded-lg" required>
                    <option value="draft">Borrador</option>
                    <option value="published">Publicado</option>
                    <option value="archived">Archivado</option>
                </select>
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Crear Página</button>
            </div>
        </form>
    </div>

</body>

</html>
