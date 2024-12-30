<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>

    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Favicon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body class="font-inter bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="fixed lg:static w-64 h-full bg-gray-900 text-white transition-transform transform lg:translate-x-0 -translate-x-full lg:block">
            <!-- Header -->
            <div class="h-14 bg-gray-800 flex items-center justify-between px-4">
                <!-- Icon and Title -->
                <div class="flex items-center">
                    <i class="fas fa-briefcase text-white text-2xl mr-3"></i>
                    <h3 class="font-bold text-xl text-white">Busca de empleo</h3>
                </div>

                <!-- Close Sidebar Button -->
                <button id="closeSidebar" class="lg:hidden text-white focus:outline-none hover:text-gray-300 transition">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>


            <!-- Menu -->
            <nav class="flex flex-col space-y-2 p-4 text-gray-300">
                <a href="#" class="flex items-center space-x-2 hover:bg-gray-700 px-4 py-2 rounded transition">
                    <i class="fas fa-sitemap"></i>
                    <span>Páginas</span>
                </a>
                <a href="#" class="flex items-center space-x-2 hover:bg-gray-700 px-4 py-2 rounded transition">
                    <i class="fas fa-blog"></i>
                    <span>Blog</span>
                </a>
                <a href="#" class="flex items-center space-x-2 hover:bg-gray-700 px-4 py-2 rounded transition">
                    <i class="fas fa-user-friends"></i>
                    <span>Usuarios</span>
                </a>
                <a href="#" class="flex items-center space-x-2 hover:bg-gray-700 px-4 py-2 rounded transition">
                    <i class="fas fa-photo-video"></i>
                    <span>Medios</span>
                </a>
                <a href="#" class="flex items-center space-x-2 hover:bg-gray-700 px-4 py-2 rounded transition">
                    <i class="fas fa-comments"></i>
                    <span>Comentarios</span>
                </a>
                <a href="#" class="flex items-center space-x-2 hover:bg-gray-700 px-4 py-2 rounded transition">
                    <i class="fas fa-cogs"></i>
                    <span>Ajustes</span>
                </a>
            </nav>

        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="h-14 bg-white shadow-md flex items-center justify-between px-4">
                <!-- Sidebar Toggle Button -->
                <button id="openSidebar" class="lg:hidden text-gray-700 focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Search Bar -->
                <form class="flex items-center w-full max-w-md mx-auto">
                    <input type="text" placeholder="Search..." class="flex-grow border border-gray-300 rounded-l-lg px-4 py-2 focus:ring-2 focus:ring-gray-500 focus:outline-none">
                    <button class="bg-gray-500 text-white px-4 py-2 rounded-r-lg hover:bg-gray-600">
                        <i class="fas fa-search"></i>
                    </button>
                </form>

                <!-- Profile -->
                <div class="relative">
                    <div class="flex items-center space-x-2 cursor-pointer" id="profileMenuToggle">
                        <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-gray-700 text-xl"></i>
                        </div>
                        <span class="text-gray-700">John Doe</span>
                        <i class="fas fa-chevron-down text-gray-700"></i>
                    </div>

                    <!-- Dropdown Menu -->
                    <div id="profileMenu" class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg hidden">
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-user-circle mr-2"></i>Ver perfil
                        </a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-cog mr-2"></i>Configuración de perfil
                        </a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-sign-out-alt mr-2"></i>Cerrar sesión
                        </a>
                    </div>
                </div>
            </header>


        </div>
    </div>

    <script>
        const profileMenuToggle = document.getElementById('profileMenuToggle');
    const profileMenu = document.getElementById('profileMenu');

    profileMenuToggle.addEventListener('click', () => {
        profileMenu.classList.toggle('hidden');
    });

    document.addEventListener('click', (event) => {
        if (!profileMenuToggle.contains(event.target) && !profileMenu.contains(event.target)) {
            profileMenu.classList.add('hidden');
        }
    });


        const sidebar = document.getElementById('sidebar');
        const openSidebar = document.getElementById('openSidebar');
        const closeSidebar = document.getElementById('closeSidebar');

        openSidebar.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
        });

        closeSidebar.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
        });
    </script>
</body>

</html>
