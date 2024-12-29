<body class="bg-gray-100">

    <header class="bg-gray-800 text-white shadow-md">
      <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        <!-- Logo/Nombre del sitio -->
        <div class="text-2xl font-semibold text-gray-200"></div>

        <!-- Perfil Administrable -->
        <div class="relative group">
          <button class="flex items-center space-x-3 bg-gray-700 p-3 rounded-full hover:bg-gray-600 focus:outline-none transition duration-300 ease-in-out">
            <img src="https://via.placeholder.com/40" alt="Perfil" class="w-8 h-8 rounded-full border-2 border-gray-500">
            <span class="hidden md:block text-white">Juan Pérez</span>
            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>

          <!-- Menú desplegable -->
          <div class="absolute right-0 mt-2 w-48 bg-gray-700 rounded-md shadow-lg opacity-0 group-hover:opacity-100 transition-all duration-300 ease-in-out transform group-hover:scale-100 scale-95">
            <a href="/" class="block px-4 py-2 text-white hover:bg-gray-600 transition duration-200 ease-in-out rounded-md">Ver Perfil</a>
            <a href="/" class="block px-4 py-2 text-white hover:bg-gray-600 transition duration-200 ease-in-out rounded-md">Configuración</a>
            <a href="/" class="block px-4 py-2 text-white hover:bg-gray-600 transition duration-200 ease-in-out rounded-md">Cerrar sesión</a>
          </div>
        </div>

      </div>
    </header>

  </body>
