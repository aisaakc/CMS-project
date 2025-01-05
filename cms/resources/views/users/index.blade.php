<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="font-inter bg-gray-50">
    <div class="flex h-screen">
        <div class="w-64 h-full bg-gray-900 text-white p-5 space-y-6">
            <x-side-menu />
        </div>

        <div class="flex-1 flex flex-col">
            @auth
                <div class="flex items-center space-x-4 mb-12">
                    <x-profile />
                </div>
                <div class="container mx-auto p-6">
                    <h1 class="text-3xl font-bold mb-4">Usuarios</h1>

                    <main class="p-6 space-y-6">
                        <div class="flex justify-between items-center">
                            <a href="{{ route('users.create') }}"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700 transition">
                                + Nuevo Usuario
                            </a>
                        </div>

                        <!-- Table -->
                        <div class="overflow-hidden bg-white shadow rounded-lg">
                            <table class="w-full table-auto">
                                <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <tr>
                                        <th class="px-4 py-3 text-left">Nombre</th>
                                        <th class="px-4 py-3 text-left">Usuario</th>
                                        <th class="px-4 py-3 text-left">Email</th>
                                        <th class="px-4 py-3 text-left">Dirección</th>
                                        <th class="px-4 py-3 text-left">Publicaciones</th>
                                        <th class="px-4 py-3 text-left">Rol</th>
                                        <th class="px-4 py-3 text-left">Fecha de Nacimiento</th>
                                        <th class="px-4 py-3 text-left">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700 text-sm">
                                    @foreach ($users as $user)
                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="px-4 py-3">{{ $user->first_name }} {{ $user->last_name }}</td>
                                            <td class="px-4 py-3">{{ $user->user_name }}</td>
                                            <td class="px-4 py-3">{{ $user->email }}</td>
                                            <td class="px-4 py-3">{{ $user->address ?? "No disponible" }}</td>
                                            <td class="px-4 py-3">{{ $user->publications->count() }}</td>
                                            <td class="px-4 py-3">{{ $user->role->name }}</td>
                                            <td class="px-4 py-3">{{ $user->date_of_birth }}</td>
                                            <td class="px-4 py-3 flex items-center space-x-3">
                                                <a href="{{ route('users.show', $user->idusers) }}"
                                                    class="text-green-500 hover:underline">Ver</a>
                                                <a href="{{ route('users.edit', $user->idusers) }}"
                                                    class="text-blue-500 hover:underline">Editar</a>
                                                <form action="{{ route('users.destroy', $user->idusers) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-red-500 hover:underline">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </main>
                @endauth
        </div>
    </div>
</body>

</html>
