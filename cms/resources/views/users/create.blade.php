<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="font-inter bg-gray-50">

    <div class="flex h-screen">
        @if (session('show_message'))
        <x-mensaje :message="session('show_message')" />
        @php
            session()->forget('show_message');
        @endphp
       @endif
        <div class="w-64 h-full bg-gray-900 text-white p-5 space-y-6">
            <x-side-menu />
        </div>

        <div class="flex-1 flex flex-col">
            @auth
                <div class="flex items-center space-x-4 mb-12">
                    <x-profile />
                </div>
                <div class="container mx-auto p-6">
                    <h1 class="text-3xl font-bold mb-4">Crear Usuario</h1>

                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="first_name" class="block text-gray-700">Nombre</label>
                            <input type="text" name="first_name" id="first_name" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>

                        <div class="mb-4">
                            <label for="last_name" class="block text-gray-700">Apellido</label>
                            <input type="text" name="last_name" id="last_name" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>

                        <div class="mb-4">
                            <label for="date_of_birth" class="block text-gray-700">Fecha de Nacimiento</label>
                            <input type="date" name="date_of_birth" id="date_of_birth" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>

                        <div class="mb-4">
                            <label for="cedula" class="block text-gray-700">Cédula</label>
                            <input type="text" name="cedula" id="cedula" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>

                        <div class="mb-4">
                            <label for="user_name" class="block text-gray-700">Nombre de Usuario</label>
                            <input type="text" name="user_name" id="user_name" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>

                        <div class="mb-4">
                            <label for="address" class="block text-gray-700">Dirección</label>
                            <input type="text" name="address" id="address" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>

                        <div class="mb-4">
                            <label for="facebook" class="block text-gray-700">Facebook</label>
                            <input type="text" name="facebook" id="facebook" class="w-full px-4 py-2 border rounded-lg">
                        </div>

                        <div class="mb-4">
                            <label for="instagram" class="block text-gray-700">Instagram</label>
                            <input type="text" name="instagram" id="instagram" class="w-full px-4 py-2 border rounded-lg">
                        </div>

                        <div class="mb-4">
                            <label for="x" class="block text-gray-700">X</label>
                            <input type="text" name="x" id="x" class="w-full px-4 py-2 border rounded-lg">
                        </div>

                        <div class="mb-4">
                            <label for="tiktok" class="block text-gray-700">TikTok</label>
                            <input type="text" name="tiktok" id="tiktok" class="w-full px-4 py-2 border rounded-lg">
                        </div>

                        <div class="mb-4">
                            <label for="descripcion" class="block text-gray-700">Descripción</label>
                            <textarea name="descripcion" id="descripcion" class="w-full px-4 py-2 border rounded-lg"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-gray-700">Contraseña</label>
                            <input type="password" name="password" id="password" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>

                        <div class="mb-4">
                            <label for="nacionalidad_idnacionalidad" class="block text-gray-700">Nacionalidad</label>
                            <select name="nacionalidad_idnacionalidad" id="nacionalidad_idnacionalidad" class="w-full px-4 py-2 border rounded-lg" required>
                                @foreach($nacionalidades as $nacionalidad)
                                    <option value="{{ $nacionalidad->idnacionalidad }}">{{ $nacionalidad->nacionalidad }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="roles_idroles" class="block text-gray-700">Rol</label>
                            <select name="roles_idroles" id="roles_idroles" class="w-full px-4 py-2 border rounded-lg" required>
                                <option value="1">Administrador</option>
                                <option value="2">Publicador</option>
                            </select>
                        </div>



                        <div class="mb-4 flex space-x-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Crear Usuario</button>
                            <a href="{{ route('users.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg">Volver a la lista</a>
                        </div>
                    </form>
                </div>
            @endauth
        </div>
    </div>

</body>

</html>
