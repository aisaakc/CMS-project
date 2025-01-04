<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body class="font-inter bg-gray-100">

    <div class="flex h-screen">

        <!-- Componente de menú lateral (Sidebar) -->
        <div class="w-64 h-full bg-gray-900 text-white p-5 space-y-6">
            <x-side-menu />
        </div>

        <!-- Contenedor principal -->
        <div class="flex-1 flex flex-col">


                <!-- Componente de perfil -->
                <div class="flex items-center space-x-4">
                    <x-profile />
                </div>


                <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Card de Publicadores -->
                    <div class="bg-blue-800 text-white p-8 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                        <h2 class="text-3xl font-bold mb-4">Cantidad de Publicadores</h2>
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center space-x-4">
                                <!-- Ícono de Publicadores -->
                                <i class="fas fa-users fa-2x"></i>
                                <span class="text-lg font-medium">Publicadores</span>
                            </div>
                            <div class="text-4xl font-semibold">{{ $publisherCount }}</div>
                        </div>
                        <div class="h-1 w-16 bg-gray-200 mb-6"></div>
                        <p class="text-lg">Este es el total de publicadores registrados en el sistema, actualizado en tiempo real.</p>
                    </div>

                    <!-- Card de Publicaciones -->
                    <div class="bg-gray-800 text-white p-8 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                        <h2 class="text-3xl font-bold mb-4">Cantidad de Publicaciones</h2>
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center space-x-4">
                                <!-- Ícono de Publicaciones -->
                                <i class="fas fa-newspaper fa-2x"></i>
                                <span class="text-lg font-medium">Total Publicaciones</span>
                            </div>
                            <div class="text-4xl font-semibold">{{ $publicationCount }}</div>
                        </div>
                        <div class="h-1 w-16 bg-gray-200 mb-6"></div>
                        <p class="text-lg">Total de publicaciones activas en la plataforma, actualizándose conforme se añaden nuevas.</p>
                    </div>
                </div>









        </div>

    </div>

</body>

</html>
