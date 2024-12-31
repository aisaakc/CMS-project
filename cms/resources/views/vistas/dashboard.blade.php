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

<body class="font-inter bg-gray-100">

    <div class="flex h-screen">

        <!-- Componente de menú lateral (Sidebar) -->
        <div class="w-64 h-full bg-gray-900 text-white transition-transform lg:block">
            <x-side-menu />
        </div>

        <!-- Componente de contenido (Perfil) -->
        <div class="flex-1 flex flex-col">
            <x-profile />
        </div>

    </div>

</body>

</html>
