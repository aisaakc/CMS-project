<header class="bg-indigo-400 dark:bg-indigo-600 p-6">
    <div class="flex justify-between items-center mx-auto max-w-screen-xl">
        <div class="flex items-center gap-4">
            <h1 class="text-3xl font-bold text-white tracking-wide">CMS</h1>
        </div>
        <nav>
            <ul class="flex gap-6">
                <li>
                    <a href="{{ route('login') }}">
                        <button class="px-4 py-2 text-lg font-semibold text-indigo-600 bg-white rounded-lg shadow-md hover:bg-indigo-100 transition duration-200 ease-in-out transform hover:scale-105">
                            Iniciar Sesión
                        </button>
                    </a>
                </li>
                <li>
                    <a href="{{ route('register') }}">
                        <button class="px-4 py-2 text-lg font-semibold text-white bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 transition duration-200 ease-in-out transform hover:scale-105">
                            Registrarse
                        </button>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>
