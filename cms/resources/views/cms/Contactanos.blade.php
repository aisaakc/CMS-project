<x-navbar/>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-4xl font-bold text-center mb-6 text-indigo-700">Contáctanos</h1>
        <p class="text-lg text-center text-gray-700 mb-8">Estamos aquí para ayudarte</p>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="bg-white p-8 shadow-lg rounded-lg flex flex-col justify-between">
                <form id="contactForm" class="space-y-6" onsubmit="handleFormSubmit(event)">
                    <div>
                        <label for="nombre" class="block text-lg font-medium text-gray-700">Nombre</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                    </div>
                    <div>
                        <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" placeholder="Tu email" class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                    </div>
                    <div>
                        <label for="mensaje" class="block text-lg font-medium text-gray-700">Mensaje</label>
                        <textarea id="mensaje" name="mensaje" rows="6" placeholder="Tu mensaje" class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required></textarea>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="px-6 py-3 bg-indigo-700 text-white font-semibold rounded-full shadow-md hover:bg-indigo-800 transition duration-300">
                            Enviar Mensaje
                        </button>
                    </div>
                </form>
                <div id="successMessage" class="mt-4 text-green-600 font-medium text-center hidden">
                    ¡Mensaje enviado con éxito!
                </div>
            </div>

            <div class="bg-white p-8 shadow-lg rounded-lg flex flex-col justify-between">
                <div class="space-y-6">
                    <div class="flex items-center space-x-4">
                        <div class="bg-indigo-100 p-3 rounded-full">
                            <i class="fas fa-envelope text-indigo-700 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold">Email</h4>
                            <span class="text-gray-600">info@empresa.com</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="bg-indigo-100 p-3 rounded-full">
                            <i class="fas fa-phone-alt text-indigo-700 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold">Teléfono</h4>
                            <span class="text-gray-600">+58 0212 873 2535</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="bg-indigo-100 p-3 rounded-full">
                            <i class="fas fa-map-marker-alt text-indigo-700 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold">Dirección</h4>
                            <span class="text-gray-600">123 Calle Principal, Ciudad, País</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="bg-indigo-100 p-3 rounded-full">
                            <i class="fas fa-clock text-indigo-700 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold">Horario</h4>
                            <span class="text-gray-600">Lunes a Viernes: 9:00 AM - 6:00 PM</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<x-footer/>

<script>

    function handleFormSubmit(event) {
        event.preventDefault();

        const nombre = document.getElementById('nombre').value;
        const email = document.getElementById('email').value;
        const mensaje = document.getElementById('mensaje').value;

        const formData = {
            nombre,
            email,
            mensaje,
        };

        localStorage.setItem('formData', JSON.stringify(formData));

        const successMessage = document.getElementById('successMessage');
        successMessage.classList.remove('hidden');
        successMessage.classList.add('block');
    }

</script>


