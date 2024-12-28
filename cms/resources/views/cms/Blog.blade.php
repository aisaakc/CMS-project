<div class="flex flex-col min-h-screen">
    <x-navbar />

    <main class="flex-grow">
        <section class="bg-gray-100 py-8">
            <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="text-center mb-12">
                    <h1 class="text-4xl font-extrabold text-gray-800 leading-tight">
                        Blog
                    </h1>
                    <p class="mt-4 text-lg text-gray-600">
                        Explora consejos, noticias y recursos para encontrar las mejores oportunidades laborales en la región.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-xl hover:scale-105">
                        <img src="https://via.placeholder.com/400x200" alt="Artículo 1" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h2 class="text-xl font-semibold text-gray-800 hover:text-indigo-600 transition duration-300">
                                <a href="#">5 consejos para destacar tu perfil profesional</a>
                            </h2>
                            <p class="mt-3 text-gray-600">
                                Aprende cómo optimizar tu CV y perfil de LinkedIn para atraer más oportunidades laborales.
                            </p>
                            <div class="mt-4 flex items-center justify-between text-sm text-gray-500">
                                <span>15 de enero, 2024</span>
                                <a href="#" class="text-indigo-600 hover:underline">Leer más</a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-xl hover:scale-105">
                        <img src="https://via.placeholder.com/400x200" alt="Artículo 2" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h2 class="text-xl font-semibold text-gray-800 hover:text-indigo-600 transition duration-300">
                                <a href="#">Cómo prepararte para una entrevista laboral</a>
                            </h2>
                            <p class="mt-3 text-gray-600">
                                Descubre las mejores estrategias para causar una impresión duradera en tu próxima entrevista.
                            </p>
                            <div class="mt-4 flex items-center justify-between text-sm text-gray-500">
                                <span>10 de enero, 2024</span>
                                <a href="#" class="text-indigo-600 hover:underline">Leer más</a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-xl hover:scale-105">
                        <img src="https://via.placeholder.com/400x200" alt="Artículo 3" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h2 class="text-xl font-semibold text-gray-800 hover:text-indigo-600 transition duration-300">
                                <a href="#">Las industrias con mayor crecimiento en 2024</a>
                            </h2>
                            <p class="mt-3 text-gray-600">
                                Analizamos las áreas con mayor demanda laboral en LATAM y cómo prepararte para ellas.
                            </p>
                            <div class="mt-4 flex items-center justify-between text-sm text-gray-500">
                                <span>5 de enero, 2024</span>
                                <a href="#" class="text-indigo-600 hover:underline">Leer más</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-footer />
</div>
