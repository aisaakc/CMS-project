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

                    <div class="mb-6">
                        <a href="{{ route('users.create') }}" class="bg-indigo-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-indigo-700 transition duration-200">Nuevo Usuario</a>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto bg-white shadow-lg rounded-lg border-t-4 border-indigo-500">
                        <table class="min-w-full table-auto">
                            <thead class="bg-indigo-50">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Nombre</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Nombre de Usuario</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Email</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Dirección</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Nro de Publicaciones</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Rol</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Fecha de Nacimiento</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Nro de Páginas</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                @foreach ($users as $user)
                                    <tr class="border-t border-gray-200 hover:bg-gray-100">
                                        <td class="px-4 py-3">{{ $user->first_name }} {{ $user->last_name }}</td>
                                        <td class="px-4 py-3">{{ $user->user_name }}</td>
                                        <td class="px-4 py-3">{{ $user->email }}</td>
                                        <td class="px-4 py-3">{{ $user->address ?? 'No disponible'}} </td>
                                        <td class="px-4 py-3">{{ $user->publications->count() ?? 'No disponible' }}</td>
                                        <td class="px-4 py-3">{{ $user->role->name }}</td>
                                        <td class="px-4 py-3">{{ $user->date_of_birth }}</td>
                                        <td class="px-4 py-3">{{ $user->nro_de_paginas ?? 'No disponible' }}</td>
                                        <td class="px-4 py-3 flex space-x-2">
                                            <a href="{{ route('users.show', $user->idusers) }}" class="text-green-600 hover:text-green-800 transition duration-200">Vista</a>

                                            <!-- Edit and Delete Actions -->
                                            @if($user->roles_idroles === 1)
                                                <!-- User with admin role cannot be edited or deleted -->
                                                <button type="button" class="text-blue-600 cursor-not-allowed opacity-50" disabled>Editar</button>
                                                <button type="button" class="text-red-600 cursor-not-allowed opacity-50" disabled>Eliminar</button>
                                            @else
                                                <a href="{{ route('users.edit', $user->idusers) }}" class="text-blue-600 hover:text-blue-800 transition duration-200">Editar</a>

                                                <form action="{{ route('users.destroy', $user->idusers) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 transition duration-200">Eliminar</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</body>

</html>
