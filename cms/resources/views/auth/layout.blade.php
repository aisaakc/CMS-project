<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        function toggleDarkMode() {
    const htmlElement = document.documentElement;
    const checkbox = document.getElementById('dark-mode-toggle');
    if (checkbox.checked) {
        htmlElement.classList.add('dark');
        localStorage.setItem('theme', 'dark');  // Guardar preferencia
    } else {
        htmlElement.classList.remove('dark');
        localStorage.setItem('theme', 'light');  // Guardar preferencia
    }
}


window.onload = function() {
    const theme = localStorage.getItem('theme');
    const checkbox = document.getElementById('dark-mode-toggle');
  
    if (theme === 'dark') {
        document.documentElement.classList.add('dark');
        checkbox.checked = true;
    } else {
        document.documentElement.classList.remove('dark');
        checkbox.checked = false; 
    }
}
    </script>
</head>
<body class="bg-gradient-to-r from-blue-100 to-indigo-100 dark:bg-gradient-to-tr dark:from-indigo-900 dark:to-slate-900 text-black dark:text-white">
    <x-header/>
    @yield('content')
    @stack('scripts')
</body>
</html>
