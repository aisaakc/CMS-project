<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <header class="bg-white shadow">
        <nav class="flex justify-between items-center mx-auto max-w-screen-xl p-6">
            <div>
                <h1 class="w-16 ">hola</h1>
            </div>
            <div class="absolute bg-white  min-h-[60vh] left-0 top-[9%]  w-full items-center px-5">
                <ul class="flex md:flex-row flex-col-reverse md:items-center md:gap-[6] gap-6">
                    <li>
                        <a class="hover:text-gray-500" href="#">HomePage</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="#">Blog</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="#">Sobre Nosostros</a>
                    </li>

                </ul>
            </div>
            <div>
                <a href="{{ route('login') }}">
                <button class="px-5 py-2 text-lg font-medium text-indigo-700 bg-white rounded-full shadow-md hover:bg-indigo-200 transition duration-300 ease-in-out transform hover:scale-110 focus:ring focus:ring-indigo-300">
                    Iniciar Sesión
                </button>
                </a>
                <a href="{{ route('register') }}">
                    <button class="px-5 py-2 text-lg font-medium text-white bg-indigo-700 rounded-full shadow-md hover:bg-indigo-800 transition duration-300 ease-in-out transform hover:scale-110 focus:ring focus:ring-indigo-500">
                        Registrarse
                    </button>
                </a>
            </div>
        </nav>
    </header>
</body>
