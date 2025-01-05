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


        <div id="sidebar"
            class="w-64 h-full bg-gray-900 text-white transition-transform transform lg:translate-x-0 -translate-x-full lg:block fixed top-0 left-0 z-10">
            <div class="h-14 bg-gray-800 flex items-center justify-between px-4">
                <div class="flex items-center">
                    <i class="fas fa-briefcase text-white text-2xl mr-3"></i>
                    <h3 class="font-bold text-xl text-white">Busca de empleo</h3>
                </div>

                <button id="toggleSidebar"
                    class="text-white focus:outline-none hover:text-gray-300 transition lg:hidden">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>

            <!-- Sidebar Menu -->
            <form action="">
                <nav class="flex flex-col space-y-2 p-4 text-gray-300">
                    @if(auth()->user()->roles_idroles == 1)
                        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 hover:bg-gray-700 px-4 py-2 rounded transition">
                            <i class="fas fa-user-friends"></i>
                            <span>Usuarios</span>
                        </a>
                    @endif

                    <a href="#" class="flex items-center space-x-2 hover:bg-gray-700 px-4 py-2 rounded transition">
                        <i class="fas fa-sitemap"></i>
                        <span>Páginas</span>
                    </a>

                    <a href="{{ route('publications') }}" class="flex items-center space-x-2 hover:bg-gray-700 px-4 py-2 rounded transition">
                        <i class="fas fa-blog"></i>
                        <span>Blog</span>
                    </a>
                </nav>

        </form>
        </div>

    </div>

</body>

</html>
