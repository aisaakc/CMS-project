<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Páginas</title>
    @vite('resources/css/app.css') <!-- Si estás usando TailwindCSS -->
</head>
<body class="flex flex-col min-h-screen">
    <!-- Navbar -->
    <x-navbar />

    <!-- Contenido principal -->
    <div class="container mx-auto p-9 flex-grow">
        <h1 class="text-4xl font-bold text-gray-800 mb-6">Páginas</h1>

        @if($pages->isEmpty())
            <p class="text-gray-600">No hay páginas publicadas en este momento.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($pages as $page)
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transition duration-300 ease-in-out">
                        <!-- Título -->
                        <h2 class="text-2xl font-semibold text-gray-800">{{ $page->title }}</h2>

                        <!-- Slug como URL -->
                        <a href="{{ url($page->slug) }}" class="text-blue-500 hover:underline">
                            {{ url($page->slug) }}
                        </a>

                        <!-- Descripción -->
                        <p class="text-gray-700 mt-4">{{ $page->description }}</p>
                    </div>
                @endforeach
            </div>

            <!-- Paginación -->
            <div class="mt-8">
                {{ $pages->links() }}
            </div>
        @endif
    </div>

    <!-- Footer -->
    <x-footer class="bg-gray-800 text-white text-center py-4 fixed bottom-0 w-full" />
</body>
</html>
