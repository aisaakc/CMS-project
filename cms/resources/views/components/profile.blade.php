<div class="flex-1 flex flex-col">
    <!-- Header -->
    <header class="h-14 bg-white shadow-md flex items-center justify-between px-6 lg:px-10">
        <!-- Sidebar Toggle Button (visible solo en pantallas pequeñas) -->
        <button id="openSidebar" class="lg:hidden text-gray-700 focus:outline-none hover:text-gray-900 transition-all">
            <i class="fas fa-bars text-xl"></i>
        </button>

        <!-- Search Bar -->
        <form class="flex items-center w-full max-w-md mx-auto">
            <input type="text" placeholder="Buscar..." class="flex-grow border border-gray-300 rounded-l-full px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all duration-300 hover:border-blue-400 shadow-sm focus:shadow-md focus:border-blue-600 text-gray-700 h-12">
            <button class="bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 text-white px-4 py-2 rounded-r-full hover:from-blue-600 hover:to-blue-800 focus:outline-none transition-all duration-300 shadow-lg focus:shadow-xl flex items-center justify-center h-12">
                <i class="fas fa-search text-lg"></i>
            </button>
        </form>

        <!-- Profile -->
        <div class="relative group">
            <div class="flex items-center space-x-2 cursor-pointer" id="profileMenuToggle">
                <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center overflow-hidden">
                    <i class="fas fa-user text-gray-700 text-xl"></i>
                </div>
                @auth
                    <span class="text-gray-700 font-semibold hidden lg:block">{{ Auth::user()->user_name }}</span>
                @endauth
                <i class="fas fa-chevron-down text-gray-700 lg:block hidden"></i>
            </div>

            <!-- Tooltip con información de usuario -->
            @auth
                <div class="absolute left-1/2 transform -translate-x-1/2 top-full mt-2 bg-gray-800 text-white text-sm rounded-lg p-3 shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 w-auto max-w-xs">
                    <p class="font-semibold">{{ Auth::user()->user_name }}</p>
                    <p class="text-xs">{{ Auth::user()->email }}</p>
                </div>
            @endauth

            <!-- Menu de perfil -->
            <div id="profileMenu" class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg hidden transition-all duration-300 transform scale-95 opacity-0 group-hover:scale-100 group-hover:opacity-100">
               <!-- Enlace para ver el perfil -->
               <a href="{{ route('edit-profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition-all duration-300">
                <i class="fas fa-user-circle mr-2"></i>Ver perfil
            </a>


                <form type="submit" action="{{ route('signOut') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 w-full text-left transition-all duration-300">
                        <i class="fas fa-sign-out-alt mr-2"></i>Cerrar sesión
                    </button>
                </form>
            </div>
        </div>
    </header>
</div>

<script>
    // JavaScript para la funcionalidad del menú de perfil
    document.addEventListener("DOMContentLoaded", function () {
        const profileMenuToggle = document.getElementById("profileMenuToggle");
        const profileMenu = document.getElementById("profileMenu");

        // Mostrar/ocultar el menú al hacer clic en el toggle
        profileMenuToggle.addEventListener("click", function (e) {
            e.stopPropagation(); // Evita que el clic se propague
            profileMenu.classList.toggle("hidden");
            profileMenu.classList.toggle("scale-95");
            profileMenu.classList.toggle("opacity-0");
        });

        // Ocultar el menú al hacer clic fuera de él
        document.addEventListener("click", function () {
            if (!profileMenu.classList.contains("hidden")) {
                profileMenu.classList.add("hidden");
                profileMenu.classList.add("scale-95");
                profileMenu.classList.add("opacity-0");
            }
        });

        // Evita que el clic dentro del menú lo cierre
        profileMenu.addEventListener("click", function (e) {
            e.stopPropagation();
        });
    });
</script>
