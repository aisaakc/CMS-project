<footer class="bg-gray-900 text-white py-8">
    <div class="max-w-screen-xl mx-auto px-6">
        <!-- Contenido del footer: secciones -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">

            <!-- Sección de información -->
            <div>
                <h3 class="text-lg font-bold mb-4">Información</h3>
                <ul>
                    <li><a href="{{ route('HomePage') }}" class="hover:text-indigo-400 transition duration-300">Inicio</a></li>
                    <li><a href="{{ route('Blog') }}" class="hover:text-indigo-400 transition duration-300">Blog</a></li>
                    <li><a href="{{ route('SobreNosostros') }}" class="hover:text-indigo-400 transition duration-300">Sobre Nosotros</a></li>
                    <li><a href="{{ route('Contactanos') }}" class="hover:text-indigo-400 transition duration-300">Contáctanos</a></li>
                </ul>
            </div>

            <!-- Sección de redes sociales -->
            <div>
                <h3 class="text-lg font-bold mb-4">Síguenos</h3>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-300 hover:text-indigo-400 transition duration-300">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-indigo-400 transition duration-300">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-indigo-400 transition duration-300">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-indigo-400 transition duration-300">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>
            </div>

            <!-- Sección de contacto -->
            <div>
                <h3 class="text-lg font-bold mb-4">Contacto</h3>
                <p class="text-sm">info@busquedaempleolatam.com</p>
                <p class="text-sm">+1 234 567 890</p>
            </div>

            <!-- Sección de suscripción -->
            <div>
                <h3 class="text-lg font-bold mb-4">Suscríbete</h3>
                <p class="text-sm mb-4">Recibe las últimas noticias y ofertas directamente en tu correo.</p>
                <form action="#" method="POST" class="flex">
                    <input type="email" placeholder="Tu correo electrónico" class="p-2 w-full rounded-l-lg text-gray-900" required>
                    <button type="submit" class="bg-indigo-700 text-white p-2 rounded-r-lg hover:bg-indigo-800 transition duration-300">Suscribirse</button>
                </form>
            </div>
        </div>

        <!-- Línea de separación -->
        <div class="mt-8 border-t border-gray-700 pt-6">
            <p class="text-center text-sm text-gray-400">© 2025 Busqueda de Empleo LATAM. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>
