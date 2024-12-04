@extends('auth.layout')

@section('content')
    <div class="min-h-screen bg-gradient-to-r from-indigo-500 to-teal-500 py-12 flex flex-col justify-center sm:py-16">
        <div class="relative py-6 sm:max-w-xl sm:mx-auto">
            <div
                class="absolute inset-0 bg-gradient-to-r from-indigo-400 to-teal-500 shadow-xl transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-8 py-10 bg-white shadow-2xl sm:rounded-3xl sm:p-16">
                <form action="{{ route('verify.questions') }}" method="POST">
                    @csrf
                    <div class="max-w-md mx-auto">
                        <div class="text-center mb-8">
                            <h1 class="text-3xl font-semibold text-gray-800">Preguntas de Seguridad</h1>
                        </div>

                        <div class="divide-y divide-gray-200">


                            <!-- Paso 3 -->
                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7 "
                                id="step-3">
                                <h2 class="text-xl text-center m-2 border-b-2 border-indigo-500 font-semibold mb-6">Responda
                                    sus preguntas de seguridad
                                </h2>
                                <div class="grid gap-8 md:grid-cols-2">
                                    <div class="w-full">
                                        <label for="pregunta_1"
                                            class="block mb-2 text-sm font-medium text-slate-700">Pregunta 1</label>




                                        @foreach ($preguntas as $items)
                                            @if ($items->idpregunta == 1)
                                                <select id="pregunta_1" name="pregunta_1"
                                                    class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                    @error('pregunta_1') border-red-500 @else border-slate-300 @enderror
                                                    transition duration-200 ease-in-out hover:bg-gray-50">
                                                    <option class="form-select value="{{ $items->idpregunta }}" selected>
                                                        {{ $items->pregunta }}</option>
                                                </select>
                                            @endif
                                        @endforeach




                                        <input type="text" id="respuesta_1" name="respuesta_1"
                                            class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border rounded-lg px-4 py-3 mt-4 focus:outline-none focus:ring-2 focus:ring-blue-500
                                        @error('respuesta_1') border-red-500 @else border-slate-300 @enderror transition duration-200 ease-in-out hover:bg-gray-50">

                                        @error('pregunta_1')
                                            <small class="text-red-500 mt-1 text-sm">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                        @enderror
                                        @error('respuesta_1')
                                            <small class="text-red-500 mt-1 text-sm">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                        @enderror
                                    </div>

                                    <div class="w-full">
                                        <label for="pregunta_2"
                                            class="block mb-2 text-sm font-medium text-slate-700">Pregunta 2</label>
                                        <select id="pregunta_2" name="pregunta_2"
                                            class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500
                                        @error('pregunta_2') border-red-500 @else border-slate-300 @enderror transition duration-200 ease-in-out hover:bg-gray-50">
                                            <option selected class="bg-gray-100">Selecciona una pregunta de seguridad
                                            </option>
                                            @foreach ($preguntas as $items)
                                                <option value="{{ $items->idpregunta }}">{{ $items->pregunta }}</option>
                                            @endforeach
                                        </select>

                                        <input type="text" id="respuesta_2" name="respuesta_2"
                                            class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border rounded-lg px-4 py-3 mt-4 focus:outline-none focus:ring-2 focus:ring-blue-500
                                        @error('respuesta_2') border-red-500 @else border-slate-300 @enderror transition duration-200 ease-in-out hover:bg-gray-50">

                                        @error('pregunta_2')
                                            <small class="text-red-500 mt-1 text-sm">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                        @enderror

                                        @error('respuesta_2')
                                            <small class="text-red-500 mt-1 text-sm">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                        @enderror
                                    </div>

                                </div>

                                <div class="grid gap-8 md:grid-cols-2 mt-6">
                                    <div class="w-full">
                                        <label for="pregunta_3"
                                            class="block mb-2 text-sm font-medium text-slate-700">Pregunta 3</label>
                                        <select id="pregunta_3" name="pregunta_3"
                                            class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out hover:bg-gray-50
                                        @error('pregunta_3') border-red-500 @else border-slate-300 @enderror">
                                            <option selected class="bg-gray-100">Selecciona una pregunta de seguridad
                                            </option>
                                            @foreach ($preguntas as $items)
                                                <option value="{{ $items->idpregunta }}">{{ $items->pregunta }}</option>
                                            @endforeach
                                        </select>

                                        <input type="text" id="respuesta_3" name="respuesta_3"
                                            class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-lg px-4 py-3 mt-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out hover:bg-gray-50
                                        @error('respuesta_3') border-red-500 @else border-slate-300 @enderror">

                                        @error('pregunta_3')
                                            <small class="text-red-500 mt-1 text-sm">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                        @enderror

                                        @error('respuesta_3')
                                            <small class="text-red-500 mt-1 text-sm">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                        @enderror
                                    </div>

                                    <div class="w-full">
                                        <label for="pregunta_4"
                                            class="block mb-2 text-sm font-medium text-slate-700">Pregunta 4</label>
                                        <select id="pregunta_4" name="pregunta_4"
                                            class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out hover:bg-gray-50
                                        @error('pregunta_4') border-red-500 @else border-slate-300 @enderror">
                                            <option selected class="bg-gray-100">Selecciona una pregunta de seguridad
                                            </option>
                                            @foreach ($preguntas as $items)
                                                <option value="{{ $items->idpregunta }}">{{ $items->pregunta }}</option>
                                            @endforeach
                                        </select>

                                        <input type="text" id="respuesta_4" name="respuesta_4"
                                            class="w-full bg-white text-slate-700 placeholder:text-slate-400 text-sm border border-slate-300 rounded-lg px-4 py-3 mt-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out hover:bg-gray-50
                                        @error('respuesta_4') border-red-500 @else border-slate-300 @enderror">

                                        @error('pregunta_4')
                                            <small class="text-red-500 mt-1 text-sm">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                        @enderror

                                        @error('respuesta_4')
                                            <small class="text-red-500 mt-1 text-sm">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="relative mt-6">
                                <button type="submit"
                                    class="w-full py-3 bg-cyan-600 text-white font-semibold rounded-lg shadow-md hover:bg-cyan-700 focus:outline-none transition duration-300 ease-in-out transform hover:scale-105">
                                    Validar Preguntas de Seguridad
                                </button>
                            </div>


                        </div>

                </form>
                <p class="mt-6 text-center text-neutral-800">
                    ¿Ya tienes cuenta?
                    <a href="{{ route('login') }}" class="text-cyan-600 hover:text-cyan-700 focus:text-cyan-700">Ingresa
                        aqui</a>
                </p>
            </div>
        </div>
    </div>
@endsection
