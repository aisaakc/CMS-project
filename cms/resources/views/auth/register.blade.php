@extends('auth.layout')

@section('content')

<div class="min-h-screen bg-gradient-to-r from-indigo-500 to-teal-500 py-12 flex flex-col justify-center sm:py-16">
    <div class="relative py-6 sm:max-w-xl sm:mx-auto">
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-400 to-teal-500 shadow-xl transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
        <div class="relative px-8 py-10 bg-white shadow-2xl sm:rounded-3xl sm:p-16">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="max-w-md mx-auto">
                    <div class="text-center mb-8">
                        <h1 class="text-3xl font-semibold text-gray-800">Registro</h1>
                    </div>

                    <div class="divide-y divide-gray-200">
                        <!-- Paso 1 -->
                        <div class="py-8 text-base leading-6 space-y-8 text-gray-700 sm:text-lg sm:leading-7" id="step-1">
                            <h2 class="text-xl text-center m-2 border-b-2 border-indigo-500 font-semibold mb-8">Paso 1</h2>

                            <div class="grid gap-8 md:grid-cols-2"> 
                                <div class="w-full"> <label for="first_name" class="block mb-2 text-sm font-medium text-slate-700">Nombres</label> 
                                    <input type="text" id="first_name" name="first_name" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out hover:bg-gray-50" placeholder="Nombre" oninput="validateName(this)" /> 
                                    @error('first_name') 
                                    <small class="text-red-500 mt-1 text-sm"> 
                                        <strong>{{ $message }}</strong> 
                                    </small> @enderror 
                                </div> 
                                <div class="w-full"> 
                                    <label for="last_name" class="block mb-2 text-sm font-medium text-slate-700">Apellidos</label> 
                                    <input type="text" id="last_name" name="last_name" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out hover:bg-gray-50" placeholder="Apellido" oninput="validateName(this)" />
                                     @error('last_name') 
                                     <small class="text-red-500 mt-1 text-sm"> 
                                        <strong>{{ $message }}</strong>
                                     </small> 
                                     @enderror 
                                    </div> 
                                </div>

                            <div class="w-full">
                            <label for="cedula" class="block mb-2 text-sm font-medium text-slate-700">Cédula de Identidad</label>
                            <div class="flex items-center space-x-4">
                                <select id="/" class="w-24 text-gray-900 text-sm rounded-lg block h-10 px-4 focus:outline-none border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out hover:bg-gray-50">
                                    <option value="IN" selected>V</option>
                                    <option value="IN" selected>E</option>
                                </select>
                                <input type="text" id="cedula" name="cedula" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out hover:bg-gray-50" placeholder="12345678"  oninput="validateCedula(event)" />
                                @error('cedula')
                                <small class="text-red-500 mt-1 text-sm">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>
                            </div>

                            <div class="grid gap-8 md:grid-cols-2">
                                <div class="mt-6">
                                    <div class="w-full">
                                        <label for="date_of_birth" class="block mb-2 text-sm font-medium text-slate-700">Fecha de Nacimiento</label>
                                        <input type="date" id="date_of_birth" name="date_of_birth" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out hover:bg-gray-50" min="1900-01-01"  />
                                        @error('date_of_birth')
                                        <small class="text-red-500 mt-1 text-sm">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <div class="w-full">
                                        <label for="nationality" class="block mb-2 text-sm font-medium text-slate-700">Nacionalidad</label>
                                        <select name="nationality" id="nationality" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out hover:bg-gray-50">
                                            <option value="">Selecciona Nacionalidad</option>
                                            <option value="c">Venezuela</option>
                                            <option value="e">Extranjera</option>
                                        </select>
                                        @error('nationality')
                                        <small class="text-red-500 mt-1 text-sm">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Paso 2 -->
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7" id="step-2">
                            <h2 class="text-xl text-center m-2 border-b-2 border-indigo-500 font-semibold mb-6">Paso 2</h2>
                            <div class="grid gap-8 md:grid-cols-2">
                                <div class="w-full">
                                    <label for="address" class="block mb-2 text-sm font-medium text-slate-700">Dirección</label>
                                    <input type="text" id="address" name="address" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out hover:bg-gray-50" placeholder="Dirección"  />
                                    @error('address')
                                    <small class="text-red-500 mt-1 text-sm">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                    @enderror
                                </div>

                                <div class="w-full">
                                    <label for="email" class="block mb-2 text-sm font-medium text-slate-700">Correo Electrónico</label>
                                    <input type="email" id="email" name="email" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out hover:bg-gray-50" placeholder="Correo Electrónico"  />
                                    @error('email')
                                    <small class="text-red-500 mt-1 text-sm">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid gap-8 md:grid-cols-2 mt-6">
                                <div class="w-full">
                                    <label for="password" class="block mb-2 text-sm font-medium text-slate-700">Contraseña</label>
                                    <div class="relative">
                                        <input type="password" id="password" name="password" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out hover:bg-gray-50" placeholder="Contraseña"  />
                                        @error('password')
                                        <small class="text-red-500 mt-1 text-sm">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror
                                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-3 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-md focus:outline-none focus:text-blue-600">
                                            <i id="eye-icon" class="fas fa-eye-slash"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="w-full">
                                    <label for="confirm_password" class="block mb-2 text-sm font-medium text-slate-700">Confirmar Contraseña</label>
                                    <div class="relative">
                                        <input type="password" id="confirm_password" name="confirm_password" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out hover:bg-gray-50" placeholder="Repite tu contraseña"  />
                                        @error('confirm_password')
                                        <small class="text-red-500 mt-1 text-sm">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror
                                        <button type="button" id="toggleConfirmPassword" class="absolute inset-y-0 right-3 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-md focus:outline-none focus:text-blue-600">
                                            <i id="eye-icon-confirm-password" class="fas fa-eye-slash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Paso 3 -->
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7 hidden" id="step-3">
                            <h2 class="text-xl text-center m-2 border-b-2 border-indigo-500 font-semibold mb-6">Paso 3</h2>
                            <div class="grid gap-8 md:grid-cols-2">
                                <div class="w-full">
                                    <label for="pregunta-1" class="block mb-2 text-sm font-medium text-slate-700">Pregunta 1: ¿Dónde naciste?</label>
                                    <input type="text" id="pregunta-1" name="pregunta-1" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out hover:bg-gray-50" />
                                    @error('pregunta-1')
                                    <small class="text-red-500 mt-1 text-sm">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="pregunta-2" class="block mb-2 text-sm font-medium text-slate-700">Pregunta 2: ¿Comida favorita?</label>
                                    <input type="text" id="pregunta-2" name="pregunta-2" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out hover:bg-gray-50" />
                                    @error('pregunta-2')
                                    <small class="text-red-500 mt-1 text-sm">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid gap-8 md:grid-cols-2 mt-6">
                                <div class="w-full">
                                    <label for="pregunta-3" class="block mb-2 text-sm font-medium text-slate-700">Pregunta 3: ¿Cantante favorito?</label>
                                    <input type="text" id="pregunta-3" name="pregunta-3" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out hover:bg-gray-50" />
                                    @error('pregunta-3')
                                    <small class="text-red-500 mt-1 text-sm">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="pregunta-4" class="block mb-2 text-sm font-medium text-slate-700">Pregunta 4: ¿Equipo favorito?</label>
                                    <input type="text" id="pregunta-4" name="pregunta-4" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out hover:bg-gray-50"  />
                                    @error('pregunta-4')
                                    <small class="text-red-500 mt-1 text-sm">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Paso 4 -->
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7 hidden" id="step-4">
                            <h2 class="text-xl text-center m-2 border-b-2 border-indigo-500 font-semibold mb-6">Paso 4</h2>
                            <div class="grid gap-8 md:grid-cols-2">
                                <div class="w-full">
                                    <label for="facebook" class="block mb-2 text-sm font-medium text-slate-700">Facebook</label>
                                    <input type="text" id="facebook" name="facebook" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out hover:bg-gray-50" />
                                    @error('facebook')
                                    <small class="text-red-500 mt-1 text-sm">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="x" class="block mb-2 text-sm font-medium text-slate-700">X (Antiguo twitter)</label>
                                    <input type="text" id="x" name="x" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out hover:bg-gray-50" />
                                    @error('x')
                                    <small class="text-red-500 mt-1 text-sm">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid gap-8 md:grid-cols-2 mt-6">
                                <div class="w-full">
                                    <label for="instagram" class="block mb-2 text-sm font-medium text-slate-700">Instagram</label>
                                    <input type="text" id="instagram" name="instagram" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out hover:bg-gray-50" />
                                    @error('instagram')
                                    <small class="text-red-500 mt-1 text-sm">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="tiktok" class="block mb-2 text-sm font-medium text-slate-700">Tik-tok</label>
                                    <input type="text" id="tiktok" name="tiktok" class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out hover:bg-gray-50" />
                                    @error('tiktok')
                                    <small class="text-red-500 mt-1 text-sm">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="descripcion" class="block mb-2 text-sm font-medium text-slate-700">Descripción</label>
                                <textarea id="" name="descripcion" cols="8" rows="5"
                                    class="w-full p-4 mb-4 border border-slate-300 rounded-lg text-slate-700 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none transition duration-200 ease-in-out hover:bg-gray-50"
                                    placeholder="Escribe una breve descripción..."></textarea>
                                @error('descripcion')
                                <small class="text-red-500 mt-1 text-sm">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between mt-8">
                        <button type="button" id="prevBtn" class="w-full py-3 bg-slate-500 text-white font-semibold rounded-lg shadow-md hover:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 transition duration-200 ease-in-out transform hover:scale-105 hidden" onclick="prevStep()">🡰 Anterior</button>
                        <button type="button" id="nextBtn" class="w-full py-3 bg-indigo-500 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 transition duration-200 ease-in-out transform hover:scale-105 mx-2" onclick="nextStep()">Siguiente 🡲</button>
                        <button type="submit" id="finishBtn" class="w-full py-3 bg-indigo-500 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 transition duration-200 ease-in-out transform hover:scale-105">Finalizar</button>
                    </div>
                </div>
            </form>
            <p class="mt-6 text-center text-neutral-800">
                ¿Ya tienes cuenta?
                <a href="{{route('login')}}" class="text-cyan-600 hover:text-cyan-700 focus:text-cyan-700">Ingresa aqui</a>
            </p>
        </div>
    </div>
</div>

<script>
    function validateName(input) 
    { const regex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/; 
        if (!regex.test(input.value)) 
        { input.value = input.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, ''); 

        } 
    }
    let currentStep = 1;

    function showStep(step) {
        for (let i = 1; i <= 4; i++) {
            document.getElementById('step-' + i).classList.add('hidden');
        }

        document.getElementById('step-' + step).classList.remove('hidden');

        if (step === 1) {
            document.getElementById('prevBtn').classList.add('hidden');
            document.getElementById('nextBtn').classList.remove('hidden');
            document.getElementById('finishBtn').classList.add('hidden');
        } else if (step === 2 || step === 3) {
            document.getElementById('prevBtn').classList.remove('hidden');
            document.getElementById('nextBtn').classList.remove('hidden');
            document.getElementById('finishBtn').classList.add('hidden');
        } else if (step === 4) {
            document.getElementById('prevBtn').classList.remove('hidden');
            document.getElementById('nextBtn').classList.add('hidden');
            document.getElementById('finishBtn').classList.remove('hidden');
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

    showStep(currentStep);

    // Evento para el campo de contraseña principal
    document.getElementById("togglePassword").addEventListener("click", function() {
        const passwordField = document.getElementById("password");
        const eyeIcon = document.getElementById("eye-icon");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.classList.replace("fa-eye-slash", "fa-eye");
        } else {
            passwordField.type = "password";
            eyeIcon.classList.replace("fa-eye", "fa-eye-slash");
        }
    });

    // Evento para el campo de confirmación de contraseña
    document.getElementById("toggleConfirmPassword").addEventListener("click", function() {
        const confirmPasswordField = document.getElementById("confirm_password");
        const confirmEyeIcon = document.getElementById("eye-icon-confirm-password");
        if (confirmPasswordField.type === "password") {
            confirmPasswordField.type = "text";
            confirmEyeIcon.classList.replace("fa-eye-slash", "fa-eye");
        } else {
            confirmPasswordField.type = "password";
            confirmEyeIcon.classList.replace("fa-eye", "fa-eye-slash");
        }
    });

      // Función para validar solo números en el campo de cédula
    // Función para validar que no se ingrese la letra "e" ni caracteres no numéricos
    function validateCedula(event) {
        const input = event.target;
        // Reemplaza cualquier caracter que no sea número o "e"
        input.value = input.value.replace(/[^0-9]/g, '');
        // O si solo deseas evitar la letra "e", usa:
        // input.value = input.value.replace(/e/gi, '');
    }

</script>

@endsection
