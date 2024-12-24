<x-navbar/>

<!-- Contenido Principal -->
<main class="flex-grow py-10 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4">

        <!-- Título de la página -->
        <h1 class="text-4xl font-bold text-center mb-6 text-indigo-700">Contáctanos</h1>

        <!-- Descripción -->
        <p class="text-lg text-center text-gray-700 mb-8">Si tienes alguna pregunta o inquietud, no dudes en ponerte en contacto con nosotros. ¡Estamos aquí para ayudarte!</p>

        <!-- Formulario de Contacto -->
        <div class="bg-white p-8 shadow-lg rounded-lg">
            <form action="-" >

                <!-- Nombre -->
                <div class="mb-6">
                    <label for="name" class="block text-lg font-medium text-gray-700">Tu Nombre</label>
                    <input type="text" id="name" name="name" class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>

                <!-- Correo Electrónico -->
                <div class="mb-6">
                    <label for="email" class="block text-lg font-medium text-gray-700">Tu Correo Electrónico</label>
                    <input type="email" id="email" name="email" class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>

                <!-- Mensaje -->
                <div class="mb-6">
                    <label for="message" class="block text-lg font-medium text-gray-700">Tu Mensaje</label>
                    <textarea id="message" name="message" rows="6" class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required></textarea>
                </div>

                <!-- Enviar -->
                <div class="flex justify-center">
                    <button type="submit" class="px-6 py-3 bg-indigo-700 text-white font-semibold rounded-full shadow-md hover:bg-indigo-800 transition duration-300">
                        Enviar Mensaje
                    </button>
                </div>
            </form>
        </div>

        <!-- Información adicional (dirección, teléfono) -->
        <div class="mt-10 text-center text-gray-700">
            <h2 class="text-2xl font-semibold mb-4">Nuestra Ubicación</h2>
            <p class="mb-4">Dirección: Calle Ficticia, 123, Ciudad, País</p>
            <p class="mb-4">Teléfono: +1 234 567 890</p>

            <!-- Mapa de Google -->
            <div class="w-full h-64">
                <iframe src="https://www.google.com/maps/embed/v1/place?q=loc:40.748817,-73.985428&key=YOUR_GOOGLE_MAPS_API_KEY" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen></iframe>
            </div>
        </div>

    </div>
</main>

<x-footer/>
