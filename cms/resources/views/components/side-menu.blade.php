<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body class="font-inter bg-gray-100">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="lg:w-64 w-full h-full bg-gray-900 text-white transition-transform transform lg:translate-x-0 -translate-x-full lg:block fixed top-0 left-0 z-10">
            <div class="h-14 bg-gray-800 flex items-center justify-between px-4">
                <div class="flex items-center">
                    <i class="fas fa-briefcase text-white text-2xl mr-3"></i>
                    <h3 class="font-bold text-xl text-white">Busqueda de empleo</h3>
                </div>
                <!-- Botón para mostrar/ocultar sidebar en dispositivos móviles -->
                <button id="toggleSidebar" class="lg:hidden text-white focus:outline-none hover:text-gray-300 transition">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>

            <form action="">
                <nav class="flex flex-col space-y-2 p-4 text-gray-300">
                  @if (auth()->user()->roles_idroles == 1)
    <a href="{{ route('dashboard') }}"
       class="flex items-center space-x-3 bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition duration-300 shadow-md hover:shadow-lg hover:shadow-gray-900/50 transform transition duration-300 hover:-translate-y-1">
        <div class="bg-gray-700 p-2 rounded-full hover:bg-gray-600 transition duration-300">
            <i class="fas fa-tachometer-alt text-white"></i>
        </div>
        <span class="font-medium">Dashboard</span>
    </a>
@endif

@if (auth()->user()->roles_idroles == 1)
    <a href="{{ route('users.index') }}"
       class="flex items-center space-x-3 bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition duration-300 shadow-md hover:shadow-lg hover:shadow-gray-900/50 transform transition duration-300 hover:-translate-y-1">
        <div class="bg-gray-700 p-2 rounded-full hover:bg-gray-600 transition duration-300">
            <i class="fas fa-user-friends text-white"></i>
        </div>
        <span class="font-medium">Usuarios</span>
    </a>
@endif

@if (auth()->user()->roles_idroles == 1)
    <a href="{{ route('pages.index') }}"
       class="flex items-center space-x-3 bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition duration-300 shadow-md hover:shadow-lg hover:shadow-gray-900/50 transform transition duration-300 hover:-translate-y-1">
        <div class="bg-gray-700 p-2 rounded-full hover:bg-gray-600 transition duration-300">
            <i class="fas fa-sitemap text-white"></i>
        </div>
        <span class="font-medium">Páginas</span>
    </a>
@endif

<a href="{{ route('publications') }}"
   class="flex items-center space-x-3 bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition duration-300 shadow-md hover:shadow-lg hover:shadow-gray-900/50 transform transition duration-300 hover:-translate-y-1">
    <div class="bg-gray-700 p-2 rounded-full hover:bg-gray-600 transition duration-300">
        <i class="fas fa-blog text-white"></i>
    </div>
    <span class="font-medium">Blog</span>
</a>

@if (auth()->user()->roles_idroles == 1)
    <a href="h"
       class="flex items-center space-x-3 bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition duration-300 shadow-md hover:shadow-lg hover:shadow-gray-900/50 transform transition duration-300 hover:-translate-y-1">
        <!-- Icono de comentario -->
        <div class="bg-gray-700 p-2 rounded-full hover:bg-gray-600 transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                <path d="M18 10c0 3.866-3.582 7-8 7a9.283 9.283 0 01-4-.9l-4.39 1.13a.6.6 0 01-.72-.72l1.13-4.39A9.283 9.283 0 012 10c0-3.866 3.582-7 8-7s8 3.134 8 7z" />
            </svg>
        </div>
        <span class="font-medium">Comentarios</span>
    </a>
@endif





                </nav>
            </form>
        </div>


    </div>

    <script>
        // Script para mostrar/ocultar el sidebar en dispositivos móviles
        document.getElementById('toggleSidebar').addEventListener('click', () => {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        });
    </script>

</body>

</html>
