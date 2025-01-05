<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Publicación</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body class="font-inter bg-gray-50">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 h-full bg-gray-900 text-white transition-transform lg:block fixed ">
            <x-side-menu />
        </div>

        <div class="flex-1 flex flex-col bg-gray-100 lg:pl-64 pl-0">

            <div class="h-14 text-white flex items-center justify-between  z-20">
                <x-profile />
            </div>

            <main class="p-4 space-y-6">
                <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-lg">
                    <h1 class="text-3xl font-bold mb-4">{{ $publication->title }}</h1>
                    <p class="text-gray-700 mb-4">{!! $publication->content !!}</p>
                    <p class="text-gray-700 mb-4"><strong>Fecha de Publicación:</strong>
                        {{ $publication->fecha_publicacion->format('Y-m-d H:i:s') }}</p>
                    <p class="text-gray-700 mb-4"><strong>Estado:</strong> {{ ucfirst($publication->estado) }}</p>
                    <p class="text-gray-700 mb-4"><strong>Categoría:</strong> {{ $publication->categoria }}</p>
                    @if ($publication->image)
                        <img src="{{ asset('storage/' . $publication->image) }}" alt="Imagen de la publicación"
                            class="mb-4">
                    @endif
                    <a href="{{ route('publications') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Volver a
                        la lista</a>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
