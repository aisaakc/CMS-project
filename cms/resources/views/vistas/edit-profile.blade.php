<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>

    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Favicon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body class="font-inter bg-gray-50">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 h-full bg-gray-900 text-white transition-transform lg:block fixed ">
            <x-side-menu />
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col bg-gray-100 lg:pl-64 pl-0">
            <!-- Header -->
            <div class="h-14 text-white flex items-center justify-between  z-20">
                <x-profile />
            </div>

            <!-- Main Content Area -->
            <main class="p-4 space-y-6">
                <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-lg grid grid-cols-1 md:grid-cols-2 gap-8">

                    <!-- Información del perfil -->
                    <div class="space-y-8">
                        <h2 class="text-3xl font-semibold text-gray-900 mb-6">Información del Perfil</h2>

                        <form action="{{ route('update.profile.picture') }}" method="POST" enctype="multipart/form-data" class="max-w-4xl mx-auto p-8 bg-white rounded-xl shadow-lg border border-gray-200">
                            @csrf

                            <!-- Nombre Completo y Cédula (En una fila) -->
                            <div class="mb-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                                @if (Auth::user()->first_name || Auth::user()->last_name)
                                    <div>
                                        <label for="full_name" class="block text-gray-700 font-medium">Nombre Completo</label>
                                        <input type="text" id="full_name" name="full_name"
                                            value="{{ old('full_name', Auth::user()->first_name . ' ' . Auth::user()->last_name) }}"
                                            class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 bg-gray-100 cursor-not-allowed" disabled>
                                    </div>
                                @endif

                                @if (Auth::user()->cedula)
                                    <div>
                                        <label for="cedula" class="block text-gray-700 font-medium">Cédula</label>
                                        <input type="text" id="cedula" name="cedula"
                                            value="{{ old('cedula', Auth::user()->cedula) }}"
                                            class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 bg-gray-100 cursor-not-allowed" disabled>
                                    </div>
                                @endif
                            </div>


                            <!-- Dirección y Nacionalidad -->
                            <div class="mb-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div>
                                    <label for="address" class="block text-gray-700 font-medium">Dirección</label>
                                    <input type="text" id="address" name="address"
                                        value="{{ old('address', Auth::user()->address ?? 'No disponible') }}"
                                        class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500">
                                </div>

                                <div>
                                    <label for="nacionalidad" class="block text-gray-700 font-medium">Nacionalidad</label>
                                    <input type="text" id="nacionalidad" name="nacionalidad"
                                        value="{{ old('nacionalidad', Auth::user()->nacionalidad) }}"
                                        class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 bg-gray-100 cursor-not-allowed" disabled>
                                </div>
                        </div>


                            <!-- Fecha de Nacimiento y Correo Electrónico -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div>
                                    <label for="date_of_birth" class="block text-gray-700 font-medium">Fecha de Nacimiento</label>
                                    <input type="text" id="date_of_birth" name="date_of_birth"
                                    value="{{ old('date_of_birth', Auth::user()->date_of_birth) }}"
                                    class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 bg-gray-100 cursor-not-allowed" disabled>
                                </div>
                                <div class="mb-8">
                                    <label for="email" class="block text-gray-700 font-medium">Correo Electrónico</label>
                                    <input type="email" id="email" name="email"
                                        value="{{ old('email', Auth::user()->email) }}"
                                        class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500
                                        @error('email') border-red-500 focus:ring-red-500 @enderror">
                                    @error('email')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-8">
                                <label for="user_name" class="block text-gray-700 font-medium">Nombre de Usuario</label>
                                <input type="text" id="user_name" name="user_name"
                                    value="{{ old('user_name', Auth::user()->user_name) }}"
                                    class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500
                                    @error('user_name') border-red-500 focus:ring-red-500 @enderror">
                                @error('user_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Botones de Guardar y Eliminar -->
                            <div class="mt-8">
                                <!-- Botón de Guardar -->
                                <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 text-white font-semibold rounded-lg shadow-lg hover:from-blue-600 hover:to-blue-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full md:w-auto mb-6">
                                    Guardar Cambios
                                </button>
                            </div>
                        </form>

                        @if (Auth::user()->roles_idroles == 2)
                            <div class="mt-6">
                                <form action="{{ route('delete.account') }}" method="POST" class="w-full">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-6 py-3 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-red-500 w-full md:w-auto">
                                        Eliminar Cuenta
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                    <!-- Redes Sociales (Movida a una nueva posición en el grid) -->
                    <div class="space-y-6 col-span-1 md:col-span-1">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Redes Sociales</h3>
                        <div class="overflow-x-auto shadow-lg rounded-lg w-full">
                            <table class="min-w-full table-auto mt-2 border-collapse mx-auto text-left">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="py-2 px-4 text-left text-sm text-gray-600">Red Social</th>
                                        <th class="py-2 px-4 text-left text-sm text-gray-600">Enlace</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="py-2 px-4 border-b">Facebook</td>
                                        <td class="py-2 px-4 border-b">{{ Auth::user()->facebook ?? 'No disponible' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 px-4 border-b">Instagram</td>
                                        <td class="py-2 px-4 border-b">{{ Auth::user()->instagram ?? 'No disponible' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 px-4 border-b">Twitter</td>
                                        <td class="py-2 px-4 border-b">{{ Auth::user()->x ?? 'No disponible' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 px-4 border-b">TikTok</td>
                                        <td class="py-2 px-4 border-b">{{ Auth::user()->tiktok ?? 'No disponible' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>

</body>


</html>
