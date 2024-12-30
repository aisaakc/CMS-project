<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>

    <!-- Google Fonts for professional typography -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Favicon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="w-screen h-screen flex">
        <!-- Sidebar -->
        <div id="sidebar" class="w-[400px] h-full bg-gray-200 text-white transition-all duration-300">
            <!-- Header -->
            <div class="h-[50px] bg-gray-900 flex items-center px-[20px]">
                <h3 class="font-bold text-xl">Admin</h3>
            </div>

            <!-- Menu -->
            <div class="h-[calc(100vh-50px)] bg-gray-800 py-[20px] flex flex-col">
                <div class="px-[20px] space-y-[10px] text-gray-300">
                    <div class="hover:text-white cursor-pointer">Dashboard</div>
                    <div class="hover:text-white cursor-pointer">Users</div>
                    <div class="hover:text-white cursor-pointer">Settings</div>
                    <div class="hover:text-white cursor-pointer">Analytics</div>
                    <div class="hover:text-white cursor-pointer">Reports</div>
                </div>

                <!-- Logout -->
                <div class="mt-auto px-[20px] h-[50px] flex items-center text-gray-300 hover:text-white cursor-pointer">
                    <div>Logout</div>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 h-full bg-gray-100">
            <!-- Header -->
            <div class="h-[50px] bg-white flex items-center shadow-md px-[20px] w-full border-b">


                <!-- Search Bar -->
                <div class="flex flex-1 justify-center items-center">
                    <form class="flex items-center w-[400px]">
                        <input type="text" class="flex-grow h-[40px] border border-gray-300 rounded-l-lg px-[10px] focus:outline-none focus:ring-2 focus:ring-gray-500" placeholder="Search...">
                        <button class="w-[50px] h-[40px] bg-gray-500 text-white rounded-r-lg flex justify-center items-center hover:bg-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 18l6-6m0 0l-6-6m6 6H4" />
                            </svg>
                        </button>
                    </form>
                </div>

                <!-- Profile Area -->
                <div class="w-[150px] flex items-center justify-end space-x-4">
                    <div class="h-8 w-8 bg-gray-300 rounded-full"></div>
                    <div class="text-gray-800">John Doe</div>
                </div>
            </div>



        </div>
    </div>


</body>



</html>
