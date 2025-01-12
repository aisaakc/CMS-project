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
                    @foreach($publications as $publication)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-xl hover:scale-105">
                            <img src="{{ asset('storage/' . $publication->image) }}" alt="{{ $publication->title }}" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h2 class="text-xl font-semibold text-gray-800 hover:text-indigo-600 transition duration-300">

                                </h2>
                                <p class="mt-3 text-gray-600">
                                    {!! $publication->content !!}
                                </p>
                                <div class="mt-4 flex items-center justify-between text-sm text-gray-500">
                                    <span>{{ $publication->created_at }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Paginación -->
                <div class="mt-8">
                    {{ $publications->links() }}
                </div>

            </div>
        </section>
    </main>

    <x-footer />
</div>
