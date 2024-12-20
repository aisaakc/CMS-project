<header class="bg-indigo-400 dark:bg-indigo-600 p-6">
    <div class="flex justify-between items-center mx-auto max-w-screen-xl">
        <div class="flex items-center gap-4">
            <h1 class="text-3xl font-bold text-white tracking-wide">CMS</h1>
        </div>
        <nav>
            <ul class="flex gap-6">
                <li>
                    <a href="{{ route('login') }}">
                        <button class="px-5 py-2 text-lg font-medium text-indigo-700 bg-white rounded-full shadow-md hover:bg-indigo-200 transition duration-300 ease-in-out transform hover:scale-110 focus:ring focus:ring-indigo-300">
                            Iniciar Sesión
                        </button>
                    </a>
                </li>
                <li>
                    <a href="{{ route('register') }}">
                        <button class="px-5 py-2 text-lg font-medium text-white bg-indigo-700 rounded-full shadow-md hover:bg-indigo-800 transition duration-300 ease-in-out transform hover:scale-110 focus:ring focus:ring-indigo-500">
                            Registrarse
                        </button>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>
