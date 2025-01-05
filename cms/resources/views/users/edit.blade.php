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
                <div class="container mx-auto p-6">
                    <h1 class="text-3xl font-bold mb-4">Editar Usuario</h1>

                    <form action="{{ route('users.update', $user->idusers) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="first_name" class="block text-gray-700">Nombre</label>
                            <input type="text" name="first_name" id="first_name" value="{{ $user->first_name }}" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>

                        <div class="mb-4">
                            <label for="last_name" class="block text-gray-700">Apellido</label>
                            <input type="text" name="last_name" id="last_name" value="{{ $user->last_name }}" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>

                        <div class="mb-4">
                            <label for="date_of_birth" class="block text-gray-700">Fecha de Nacimiento</label>
                            <input type="date" name="date_of_birth" id="date_of_birth" value="{{ $user->date_of_birth }}" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>

                        <div class="mb-4">
                            <label for="cedula" class="block text-gray-700">Cédula</label>
                            <input type="text" name="cedula" id="cedula" value="{{ $user->cedula }}" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>

                        <div class="mb-4">
                            <label for="user_name" class="block text-gray-700">Nombre de Usuario</label>
                            <input type="text" name="user_name" id="user_name" value="{{ $user->user_name }}" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>

                        <div class="mb-4">
                            <label for="address" class="block text-gray-700">Dirección</label>
                            <input type="text" name="address" id="address" value="{{ $user->address }}" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ $user->email }}" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>

                        <div class="mb-4">
                            <label for="facebook" class="block text-gray-700">Facebook</label>
                            <input type="text" name="facebook" id="facebook" value="{{ $user->facebook }}" class="w-full px-4 py-2 border rounded-lg">
                        </div>

                        <div class="mb-4">
                            <label for="instagram" class="block text-gray-700">Instagram</label>
                            <input type="text" name="instagram" id="instagram" value="{{ $user->instagram }}" class="w-full px-4 py-2 border rounded-lg">
                        </div>

                        <div class="mb-4">
                            <label for="x" class="block text-gray-700">X</label>
                            <input type="text" name="x" id="x" value="{{ $user->x }}" class="w-full px-4 py-2 border rounded-lg">
                        </div>

                        <div class="mb-4">
                            <label for="tiktok" class="block text-gray-700">TikTok</label>
                            <input type="text" name="tiktok" id="tiktok" value="{{ $user->tiktok }}" class="w-full px-4 py-2 border rounded-lg">
                        </div>

                        <div class="mb-4">
                            <label for="descripcion" class="block text-gray-700">Descripción</label>
                            <textarea name="descripcion" id="descripcion" class="w-full px-4 py-2 border rounded-lg">{{ $user->descripcion }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-gray-700">Contraseña</label>
                            <input type="password" name="password" id="password" class="w-full px-4 py-2 border rounded-lg">
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-gray-700">Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-4 py-2 border rounded-lg">
                        </div>

                        <div class="mb-4">
                            <label for="nacionalidad_idnacionalidad" class="block text-gray-700">Nacionalidad</label>
                            <input type="text" name="nacionalidad_idnacionalidad" id="nacionalidad_idnacionalidad" value="{{ $user->nacionalidad_idnacionalidad }}" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>

                        <div class="mb-4">
                            <label for="roles_idroles" class="block text-gray-700">Rol</label>
                            <select name="roles_idroles" id="roles_idroles" class="w-full px-4 py-2 border rounded-lg" required>
                                <option value="1" {{ $user->roles_idroles == 1 ? 'selected' : '' }}>Administrador</option>
                                <option value="2" {{ $user->roles_idroles == 2 ? 'selected' : '' }}>Publicador</option>
                                <option value="3" {{ $user->roles_idroles == 3 ? 'selected' : '' }}>Visitante</option>
                            </select>
                        </div>




                        <div class="mb-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Actualizar Usuario</button>
                        </div>
                    </form>
                </div>
            @endauth
        </div>
    </div>

</body>

</html>
