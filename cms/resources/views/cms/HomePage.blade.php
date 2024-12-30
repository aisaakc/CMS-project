<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col font-sans">

    <x-navbar />

    <main class="flex-grow">

        <div class="bg-gradient-to-br from-blue-700 to-indigo-800 text-white py-28 shadow-lg">
            <div class="container mx-auto px-6 lg:px-16 text-center">
                <h1 class="text-5xl font-extrabold leading-tight tracking-tight animate-fadeInDown">
                    Bienvenidos a nuestra página de búsqueda de empleo
                </h1>
                <p class="text-lg lg:text-xl mt-6 font-medium max-w-3xl mx-auto leading-relaxed">
                    Conectamos a los mejores talentos con las oportunidades laborales ideales para su crecimiento
                    profesional. Nuestra misión es ser el puente entre el éxito y tus metas.
                </p>
                <div class="mt-10">
                    <a href="#" class="px-8 py-4 bg-white text-blue-700 font-semibold rounded-lg shadow-lg hover:bg-blue-600 hover:text-white hover:shadow-2xl hover:scale-105 transition duration-300 ease-in-out">
                        Descubre nuestros servicios
                    </a>
                </div>
            </div>
        </div>

        <section id="services" class="container mx-auto px-6 lg:px-16 py-24">
            <h2 class="text-4xl font-bold text-gray-800 text-center mb-16">
                Nuestros Servicios
            </h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-16">

                <div class="bg-white rounded-lg shadow-xl p-8 hover:shadow-2xl transition duration-300">
                    <h3 class="text-2xl font-semibold text-indigo-600 mb-4">Consultoría en Desarrollo Profesional</h3>
                    <p class="text-gray-600">
                        Ayudamos a los candidatos a desarrollar sus habilidades y optimizar su perfil profesional
                        para aumentar sus oportunidades en el mercado laboral.
                    </p>
                </div>

                <div class="bg-white rounded-lg shadow-xl p-8 hover:shadow-2xl transition duration-300">
                    <h3 class="text-2xl font-semibold text-blue-600 mb-4">Conexión con Empleadores Líderes</h3>
                    <p class="text-gray-600">
                        Facilitamos la conexión entre los mejores talentos y las empresas más destacadas,
                        mejorando el proceso de contratación para ambas partes.
                    </p>
                </div>

                <div class="bg-white rounded-lg shadow-xl p-8 hover:shadow-2xl transition duration-300">
                    <h3 class="text-2xl font-semibold text-teal-600 mb-4">Entrenamiento y Preparación para Entrevistas</h3>
                    <p class="text-gray-600">
                        Preparamos a los candidatos para entrevistas de trabajo mediante simulaciones y asesoramiento
                        personalizado, ayudando a que se presenten de manera más efectiva y segura.
                    </p>
                </div>

                <div class="bg-white rounded-lg shadow-xl p-8 hover:shadow-2xl transition duration-300">
                    <h3 class="text-2xl font-semibold text-green-600 mb-4">Evaluaciones de Habilidades</h3>
                    <p class="text-gray-600">
                        Realizamos evaluaciones de habilidades y competencias para ayudar tanto a candidatos como
                        a empresas a encontrar el ajuste perfecto entre el perfil profesional y las necesidades del puesto.
                    </p>
                </div>
            </div>
        </section>
    </main>
    <x-footer />
</body>
