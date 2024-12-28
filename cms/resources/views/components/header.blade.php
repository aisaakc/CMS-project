<header class="bg-white shadow-lg">
    <nav class="flex justify-between items-center max-w-screen-xl mx-auto p-6">
        <div class="flex items-center">
            <i class="fas fa-briefcase text-indigo-700 text-2xl mr-3"></i>
            <h1 class="text-xl font-bold text-gray-800">Búsqueda de empleo en LATAM</h1>
        </div>

        <!-- Menú para pantallas grandes -->
        <div class="hidden md:flex ml-10 space-x-8">
            <ul class="flex items-center space-x-4">
                <li>
                    <a href="{{ route('HomePage') }}" class="text-sm text-gray-700 hover:text-indigo-600 transition duration-300 flex items-center">
                        <i class="fa-solid fa-house mr-2"></i>
                        Inicio
                    </a>
                </li>

                <li>
                    <a href="{{ route('Blog') }}" class="text-sm text-gray-700 hover:text-indigo-600 transition duration-300 flex items-center">
                        <i class="fa-solid fa-book mr-2"></i>
                        Blog
                    </a>
                </li>

                <li>
                    <a href="{{ route('SobreNosostros') }}" class="text-sm text-gray-700 hover:text-indigo-600 transition duration-300 flex items-center">
                        <i class="fa-solid fa-users mr-2"></i>
                        Sobre Nosotros
                    </a>
                </li>

                <li>
                    <a href="{{ route('Contactanos') }}" class="text-sm text-gray-700 hover:text-indigo-600 transition duration-300 flex items-center">
                        <i class="fa-solid fa-phone"></i>
                        Contáctanos
                    </a>
                </li>
            </ul>
        </div>

        <!-- Botón de hamburguesa para pantallas pequeñas -->
        <div class="md:hidden flex items-center">
            <button id="hamburger" class="text-gray-700 hover:text-indigo-600">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </nav>

    <!-- Menú desplegable para móviles -->
    <div id="mobileMenu" class="md:hidden hidden bg-white shadow-lg">
        <ul class="space-y-4 p-6">
            <li>
                <a href="{{ route('HomePage') }}" class="text-sm text-gray-700 hover:text-indigo-600 transition duration-300 flex items-center">
                    <i class="fa-solid fa-house mr-2"></i>
                    Inicio
                </a>
            </li>

            <li>
                <a href="{{ route('Blog') }}" class="text-sm text-gray-700 hover:text-indigo-600 transition duration-300 flex items-center">
                    <i class="fa-solid fa-book mr-2"></i>
                    Blog
                </a>
            </li>

            <li>
                <a href="{{ route('SobreNosostros') }}" class="text-sm text-gray-700 hover:text-indigo-600 transition duration-300 flex items-center">
                    <i class="fa-solid fa-users mr-2"></i>
                    Sobre Nosotros
                </a>
            </li>

            <li>
                <a href="{{ route('Contactanos') }}" class="text-sm text-gray-700 hover:text-indigo-600 transition duration-300 flex items-center">
                    <i class="fa-solid fa-phone"></i>
                    Contáctanos
                </a>
            </li>
        </ul>
    </div>
</header>

<!-- Script para toggle de menú en móviles -->
<script>
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobileMenu');

    hamburger.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
