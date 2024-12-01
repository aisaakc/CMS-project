@extends('auth.layout')

@section('content')

<div class="min-h-screen bg-gradient-to-r from-indigo-500 to-teal-500 py-6 flex flex-col justify-center sm:py-12">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-400 to-teal-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
        <div class="relative px-6 py-10 bg-white shadow-2xl sm:rounded-3xl sm:p-20">
            <form action="" method="POST">
                <div class="max-w-md mx-auto">
                    <div class="text-center mb-6">
                        <h1 class="text-3xl font-semibold text-gray-800">Registro</h1>
                    </div>

                    <div class="divide-y divide-gray-200">
                        <!-- Paso 1 -->
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7 hidden" id="step-1">
                            <div class="grid gap-6 md:grid-cols-2">
                                <div class="w-full">
                                    <label for="first_name" class="block mb-2 text-sm font-medium text-slate-700">Nombres</label>
                                    <input type="text" id="first_name" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Nombre" required />
                                </div>
                                <div class="w-full">
                                    <label for="last_name" class="block mb-2 text-sm font-medium text-slate-700">Apellidos</label>
                                    <input type="text" id="last_name" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Apellido" required />
                                </div>
                            </div>

                            <div class="grid gap-6 md:grid-cols-2 mt-6">
                                <div class="w-full">
                                    <label for="cedula" class="block mb-2 text-sm font-medium text-slate-700">Cédula</label>
                                    <input type="number" id="cedula" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="12345678" required />
                                </div>
                                <div class="w-full">
                                    <label for="fecha_nacimiento" class="block mb-2 text-sm font-medium text-slate-700">Fecha de Nacimiento</label>
                                    <input type="date" id="fecha_nacimiento" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
                                </div>
                            </div>

                            <div class="mt-6">
                                <div class="w-full">
                                    <label for="nacionalidad" class="block mb-2 text-sm font-medium text-slate-700">Nacionalidad</label>
                                    <select id="nacionalidad" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option selected>Selecciona Nacionalidad</option>
                                        <option>Venezolana</option>
                                        <option>Colombiana</option>
                                        <option>Peruana</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Paso 2 -->
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7 hidden" id="step-2">
                            <div class="grid gap-6 md:grid-cols-2">
                                <div class="w-full">
                                    <label for="direccion" class="block mb-2 text-sm font-medium text-slate-700">Dirección</label>
                                    <input type="text" id="direccion" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Dirección" required />
                                </div>
                                <div class="w-full">
                                    <label for="correo" class="block mb-2 text-sm font-medium text-slate-700">Correo Electrónico</label>
                                    <input type="email" id="correo" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Correo Electrónico" required />
                                </div>
                            </div>

                            <div class="grid gap-6 md:grid-cols-2 mt-6">
                                <div class="w-full">
                                    <label for="password" class="block mb-2 text-sm font-medium text-slate-700">Contraseña</label>
                                    <input type="password" id="password" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
                                </div>
                                <div class="w-full">
                                    <label for="confirm_password" class="block mb-2 text-sm font-medium text-slate-700">Confirmar Contraseña</label>
                                    <input type="password" id="confirm_password" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
                                </div>
                            </div>
                        </div>

                        <!-- Paso 3 -->
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7 hidden" id="step-3">
                            <div class="grid gap-6 md:grid-cols-2">
                                <div class="w-full">
                                    <label for="pregunta1" class="block mb-2 text-sm font-medium text-slate-700">Pregunta 1: ¿Dónde naciste?</label>
                                    <input type="text" id="pregunta1" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
                                </div>
                                <div class="w-full">
                                    <label for="pregunta2" class="block mb-2 text-sm font-medium text-slate-700">Pregunta 2: ¿Comida favorita?</label>
                                    <input type="text" id="pregunta2" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
                                </div>
                            </div>

                            <div class="grid gap-6 md:grid-cols-2 mt-6">
                                <div class="w-full">
                                    <label for="pregunta3" class="block mb-2 text-sm font-medium text-slate-700">Pregunta 3: ¿Anime favorito?</label>
                                    <input type="text" id="pregunta3" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
                                </div>
                                <div class="w-full">
                                    <label for="pregunta4" class="block mb-2 text-sm font-medium text-slate-700">Pregunta 4: ¿Equipo favorito?</label>
                                    <input type="text" id="pregunta4" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
                                </div>
                            </div>
                        </div>

                        <!-- Paso 4 -->
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7 hidden" id="step-4">
                         
                            <div class="w-full">
                                <label for="confirmacion" class="block mb-2 text-sm font-medium text-slate-700">Confirmación</label>
                                <input type="text" id="confirmacion" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
                            </div>
                        </div>

                        <!-- Botones de navegación -->
                        <div class="flex justify-between mt-8">
                            <button type="button" id="prevBtn" class="bg-slate-500 text-white py-2 px-4 rounded-full shadow-sm hover:bg-slate-600 hidden" onclick="prevStep()">🡰 Anterior</button>
                            <button type="button" id="nextBtn" class="bg-indigo-500 text-white py-2 px-4 rounded-full shadow-sm hover:bg-indigo-600" onclick="nextStep()">Siguiente 🡲 </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let currentStep = 1;

    function showStep(step) {
        // Ocultar todos los pasos
        for (let i = 1; i <= 4; i++) {
            document.getElementById('step-' + i).classList.add('hidden');
        }
        
        // Mostrar el paso actual
        document.getElementById('step-' + step).classList.remove('hidden');

        // Controlar visibilidad de los botones
        if (step === 1) {
            document.getElementById('prevBtn').classList.add('hidden');
            document.getElementById('nextBtn').classList.remove('hidden');
        } else if (step === 2 || step === 3) {
            document.getElementById('prevBtn').classList.remove('hidden');
            document.getElementById('nextBtn').classList.remove('hidden');
        } else if (step === 4) {
            document.getElementById('prevBtn').classList.remove('hidden');
            document.getElementById('nextBtn').classList.add('hidden');
        }
    }

    function nextStep() {
        if (currentStep < 4) {
            currentStep++;
            showStep(currentStep);
        }
    }

    function prevStep() {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    }

    // Mostrar el primer paso al cargar
    showStep(currentStep);
</script>


@endsection