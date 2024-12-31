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


