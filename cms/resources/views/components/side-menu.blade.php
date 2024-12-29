<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800">
    <div id="sidebar" class="w-64 bg-gray-900 text-white h-screen fixed left-0 top-0 transition-transform transform -translate-x-full lg:translate-x-0 z-50">
        <div class="p-4 flex items-center justify-between border-b border-gray-700">
            <div class="flex items-center space-x-2">
                <i class="bx bxl-audible text-3xl"></i>
                <span id="sidebar-title" class="text-2xl font-semibold">Busqueda de empleo</span>
            </div>
            <button id="toggle-sidebar" class="lg:hidden text-white text-3xl">
                <i class="bx bx-menu"></i>
            </button>
        </div>
        <ul class="mt-8 space-y-2">
            <li>
                <a href="#" class="flex items-center py-3 px-6 text-lg rounded-lg hover:bg-gray-700 transition-colors duration-200 group">
                    <i class="fas fa-home mr-3"></i>
                    <span class="sidebar-text">Páginas</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center py-3 px-6 text-lg rounded-lg hover:bg-gray-700 transition-colors duration-200 group">
                    <i class="fas fa-blog mr-3"></i>
                    <span class="sidebar-text">Blog</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center py-3 px-6 text-lg rounded-lg hover:bg-gray-700 transition-colors duration-200 group">
                    <i class="fas fa-users mr-3"></i>
                    <span class="sidebar-text">Usuarios</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center py-3 px-6 text-lg rounded-lg hover:bg-gray-700 transition-colors duration-200 group">
                    <i class="fas fa-image mr-3"></i>
                    <span class="sidebar-text">Medios</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center py-3 px-6 text-lg rounded-lg hover:bg-gray-700 transition-colors duration-200 group">
                    <i class="fas fa-comments mr-3"></i>
                    <span class="sidebar-text">Comentarios</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center py-3 px-6 text-lg rounded-lg hover:bg-gray-700 transition-colors duration-200 group">
                    <i class="fas fa-cogs mr-3"></i>
                    <span class="sidebar-text">Ajustes</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center py-3 px-6 text-lg rounded-lg hover:bg-gray-700 transition-colors duration-200 group">
                    <i class="fas fa-user mr-3"></i>
                    <span class="sidebar-text">Perfil</span>
                </a>
            </li>
        </ul>
        <div class="absolute bottom-10 left-0 w-full text-center text-gray-500 text-sm">
            <p>&copy; 2025 Busqueda de empleo. Todos los derechos reservados.</p>
        </div>
    </div>
</body>
