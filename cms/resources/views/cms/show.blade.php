<div class="flex flex-col min-h-screen">
    <x-navbar />

    <main class="flex-grow">
        <section class="bg-gray-100 py-8">
            <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Título de la publicación -->
                <div class="text-center mb-12">
                    <h1 class="text-4xl font-extrabold text-gray-800 leading-tight">
                        {{ $publication->title }}
                    </h1>
                    <p class="mt-4 text-lg text-gray-600">
                        {{ $publication->category ? $publication->category->name : 'Categoría no disponible' }}
                    </p>
                </div>

                <!-- Imagen y contenido de la publicación -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('storage/' . $publication->image) }}" alt="{{ $publication->title }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="mt-4 text-gray-600">
                            <!-- Mostrar el contenido de la publicación -->
                            {!! $publication->content !!}
                        </div>
                    </div>
                </div>

                <div class="mt-4 text-sm text-gray-500">
                    <!-- Mostrar el nombre del autor y fecha de la publicación -->
                    <span>Publicado por: {{ $publication->user->first_name }} {{ $publication->user->last_name }}</span><br>
                    <span>Fecha de Publicación: {{ \Carbon\Carbon::parse($publication->fecha_publicacion)->format('d/m/Y H:i') }}</span>
                </div>

            </div>
        </section>
    </main>

    <x-footer />
</div>
