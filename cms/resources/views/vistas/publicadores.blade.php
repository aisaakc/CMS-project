<body class="font-inter bg-gray-100">
    <div class="flex h-screen">

        <div class="w-64 h-full bg-gray-900 text-white p-5 space-y-6">
            <x-side-menu />
        </div>

        <div class="flex-1 flex flex-col">

            <div class="h-14 text-white flex items-center justify-between z-20">
                <x-profile />
            </div>

            <div class="p-8 flex-1 overflow-y-auto">
                <h2 class="text-3xl font-semibold mb-6 text-gray-800">Lista de Publicadores Registrados</h2>
                <div class="overflow-x-auto bg-white shadow-lg rounded-lg border border-gray-300">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-50">Nombre Completo</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-50">Nombre de Usuario</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-50">Email</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-50">Cédula</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-50">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($publishers as $publisher)
                                <tr class="hover:bg-gray-50 transition duration-300">
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $publisher->first_name }} {{ $publisher->last_name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $publisher->user_name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $publisher->email }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $publisher->cedula }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">
                                        <a href="#" class="text-blue-600 hover:text-blue-800 transition duration-200">Ver</a>
                                        <a href="#" class="ml-4 text-yellow-600 hover:text-yellow-800 transition duration-200">Editar</a>
                                        <form action="#" method="POST" class="inline ml-4">
                                            <button type="submit" class="text-red-600 hover:text-red-800 transition duration-200">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
