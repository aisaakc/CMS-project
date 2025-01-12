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

                <!-- Mostrar publicaciones si existen, o mensaje si no hay -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($publications as $publication)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-xl hover:scale-105">
                            <img src="{{ asset('storage/' . $publication->image) }}" alt="{{ $publication->title }}" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <!-- Mostrar la categoría de la publicación encima del título -->
                                @if($publication->category)
                                    <div class="text-sm font-medium text-indigo-600">
                                        {{ $publication->category->name }}
                                    </div>
                                @endif

                                <h2 class="text-xl font-semibold text-gray-800 hover:text-indigo-600 transition duration-300">
                                    {{ $publication->title }}
                                </h2>
                                <p class="mt-3 text-gray-600">
                                    {!! $publication->content !!}
                                </p>

                                <!-- Información del autor y fecha -->
                                <div class="mt-4 text-sm text-gray-500">
                                    <p>Publicado por: {{ $publication->user->first_name }} {{ $publication->user->last_name }}</p>
                                    <p>Fecha de publicación: {{ \Carbon\Carbon::parse($publication->fecha_publicacion)->format('d/m/Y') }}</p>
                                </div>

                                <!-- Botón de "Leer más" -->
                                <div class="mt-4">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium">
                                        Leer más
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <!-- Si no hay publicaciones -->
                        <div class="col-span-3 text-center">
                            <p class="text-lg text-gray-600">No hay publicaciones disponibles en este momento.</p>
                            <p class="text-lg text-gray-600">Fecha actual: {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
                        </div>
                    @endforelse
                </div>

                <!-- Paginación -->
                @if($publications->count() > 0)
                    <div class="mt-8">
                        {{ $publications->links() }}
                    </div>
                @endif

            </div>
        </section>
    </main>

    <x-footer />
</div>
