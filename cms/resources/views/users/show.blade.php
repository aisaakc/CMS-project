<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-inter bg-gray-50">

    <div class="flex h-screen">
        <div class="w-64 h-full bg-gray-900 text-white p-5 space-y-6">
            <x-side-menu />
        </div>

        <div class="flex-1 flex flex-col">
            @auth
                <div class="flex items-center space-x-4 mb-12 p-4 bg-white shadow-md">
                    <x-profile />
                </div>
                <div class="container mx-auto p-6 bg-white rounded-lg shadow-lg">
                    <h1 class="text-3xl font-bold mb-4">{{ $user->first_name }} {{ $user->last_name }}</h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <p class="text-gray-700"><strong>Email:</strong> {{ $user->email }}</p>
                        <p class="text-gray-700"><strong>Nombre de Usuario:</strong> {{ $user->user_name }}</p>
                        <p class="text-gray-700"><strong>Dirección:</strong> {{ $user->address }}</p>
                        <p class="text-gray-700"><strong>Fecha de Nacimiento:</strong> {{ $user->date_of_birth }}</p>
                        <p class="text-gray-700"><strong>Rol:</strong> {{ $user->role->name }}</p>
                        <p class="text-gray-700"><strong>Nacionalidad:</strong> {{ $user->nacionalidad->name }}</p>
                        <p class="text-gray-700"><strong>Facebook:</strong> {{ $user->facebook }}</p>
                        <p class="text-gray-700"><strong>Instagram:</strong> {{ $user->instagram }}</p>
                        <p class="text-gray-700"><strong>X:</strong> {{ $user->x }}</p>
                        <p class="text-gray-700"><strong>TikTok:</strong> {{ $user->tiktok }}</p>
                        <p class="text-gray-700"><strong>Descripción:</strong> {{ $user->descripcion }}</p>
                        <p class="text-gray-700"><strong>Número de Publicaciones:</strong> {{ $user->publications->count() }}</p>
                    </div>

                    <h2 class="text-2xl font-bold mt-8 mb-4">Publicaciones Destacadas</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($user->publications->take(3) as $publication)
                            <div class="bg-white p-4 rounded-lg shadow-lg">
                                <h3 class="text-xl font-bold mb-2">{{ $publication->title }}</h3>
                                <p class="text-gray-700">{{ Str::limit($publication->content, 100) }}</p>
                                <a href="{{ route('publications.show', $publication->idpublications) }}" class="text-blue-500 hover:text-blue-700">Leer más</a>
                            </div>
                        @endforeach
                    </div>

                    <a href="{{ route('users.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg mt-4 inline-block">Volver a la lista</a>
                </div>
            @endauth
        </div>
    </div>

</body>

</html>
