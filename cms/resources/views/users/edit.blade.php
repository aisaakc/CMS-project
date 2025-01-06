<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
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
                <div class="container mx-auto p-8">

                    <!-- Título principal -->
                    <h1 class="text-3xl font-semibold text-gray-800 mb-8">Editar Usuario</h1>

                    <!-- Formulario -->
                    <form action="{{ route('users.update', $user->idusers) }}" method="POST" class="bg-white p-8 shadow-lg rounded-lg space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Grid con dos columnas (adaptable) -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                            <!-- Nombre -->
                            <div class="mb-4">
                                <label for="first_name" class="block text-gray-700 font-semibold mb-2">Nombre</label>
                                <input type="text" name="first_name" id="first_name" value="{{ $user->first_name }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                            </div>

                            <!-- Apellido -->
                            <div class="mb-4">
                                <label for="last_name" class="block text-gray-700 font-semibold mb-2">Apellido</label>
                                <input type="text" name="last_name" id="last_name" value="{{ $user->last_name }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                            </div>

                            <!-- Fecha de Nacimiento -->
                            <div class="mb-4">
                                <label for="date_of_birth" class="block text-gray-700 font-semibold mb-2">Fecha de Nacimiento</label>
                                <input type="date" name="date_of_birth" id="date_of_birth" value="{{ $user->date_of_birth }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                            </div>

                            <!-- Cédula -->
                            <div class="mb-4">
                                <label for="cedula" class="block text-gray-700 font-semibold mb-2">Cédula</label>
                                <input type="text" name="cedula" id="cedula" value="{{ $user->cedula }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                            </div>

                            <!-- Nombre de Usuario -->
                            <div class="mb-4">
                                <label for="user_name" class="block text-gray-700 font-semibold mb-2">Nombre de Usuario</label>
                                <input type="text" name="user_name" id="user_name" value="{{ $user->user_name }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                            </div>

                            <!-- Dirección -->
                            <div class="mb-4">
                                <label for="address" class="block text-gray-700 font-semibold mb-2">Dirección</label>
                                <input type="text" name="address" id="address" value="{{ $user->address }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                            </div>

                            <!-- Email -->
                            <div class="mb-4">
                                <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                                <input type="email" name="email" id="email" value="{{ $user->email }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                            </div>

                            <!-- Redes sociales -->
                            <div class="mb-4">
                                <label for="facebook" class="block text-gray-700 font-semibold mb-2">Facebook</label>
                                <input type="text" name="facebook" id="facebook" value="{{ $user->facebook }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                            </div>

                            <div class="mb-4">
                                <label for="instagram" class="block text-gray-700 font-semibold mb-2">Instagram</label>
                                <input type="text" name="instagram" id="instagram" value="{{ $user->instagram }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                            </div>

                            <div class="mb-4">
                                <label for="x" class="block text-gray-700 font-semibold mb-2">X</label>
                                <input type="text" name="x" id="x" value="{{ $user->x }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                            </div>

                            <div class="mb-4">
                                <label for="tiktok" class="block text-gray-700 font-semibold mb-2">TikTok</label>
                                <input type="text" name="tiktok" id="tiktok" value="{{ $user->tiktok }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                            </div>

                            <!-- Descripción -->
                            <div class="mb-4 col-span-2">
                                <label for="descripcion" class="block text-gray-700 font-semibold mb-2">Descripción</label>
                                <textarea name="descripcion" id="descripcion"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">{{ $user->descripcion }}</textarea>
                            </div>

                            <!-- Contraseña -->
                            <div class="mb-4">
                                <label for="password" class="block text-gray-700 font-semibold mb-2">Contraseña</label>
                                <input type="password" name="password" id="password"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                            </div>

                            <!-- Confirmar Contraseña -->
                            <div class="mb-4">
                                <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2">Confirmar Contraseña</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                            </div>

                            <!-- Nacionalidad -->
                            <div class="mb-4">
                                <label for="nacionalidad_idnacionalidad" class="block text-gray-700 font-semibold mb-2">Nacionalidad</label>
                                <input type="text" name="nacionalidad_idnacionalidad" id="nacionalidad_idnacionalidad"
                                    value="{{ $user->nacionalidad_idnacionalidad }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                            </div>

                            <!-- Rol -->
                            <div class="mb-4">
                                <label for="roles_idroles" class="block text-gray-700 font-semibold mb-2">Rol</label>
                                <select name="roles_idroles" id="roles_idroles"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                                    <option value="1" {{ $user->roles_idroles == 1 ? 'selected' : '' }}>Administrador</option>
                                    <option value="2" {{ $user->roles_idroles == 2 ? 'selected' : '' }}>Publicador</option>
                                    <option value="3" {{ $user->roles_idroles == 3 ? 'selected' : '' }}>Visitante</option>
                                </select>
                            </div>
                        </div>

                        <!-- Botón de Submit -->
                        <div class="mb-4">
                            <button type="submit"
                                class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                                Actualizar Usuario
                            </button>
                        </div>
                    </form>
                </div>
            @endauth
        </div>
    </div>

</body>

</html>
