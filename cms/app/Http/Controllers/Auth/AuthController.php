<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Nacionalidad;
use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;


class AuthController extends Controller
{


    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function verify()
    {
        return view('auth.verify');
    }

    public function showForm()
    {
        $nacionalidades = Nacionalidad::all();

        $preguntas = Pregunta::all();

        return view('auth.register', compact('nacionalidades', 'preguntas'));
    }

    public function registerVerify(Request $request)
{
    // Validación de los campos
    $request->validate([
        'first_name' => 'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
        'last_name' => 'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
        'cedula' => 'required|unique:users,cedula|regex:/^[0-9]{6,10}$/',
        'date_of_birth' => 'required|date|before:today|before_or_equal:today' . now()->subYears(18)->toDateString(),
        'nacionalidad' => 'required',
        'password' => 'required|min:8',
        'password_confirmation' => 'required|same:password',
        'address' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'pregunta_1' => 'required',
        'pregunta_2' => 'required',
        'pregunta_3' => 'required',
        'pregunta_4' => 'required',
        'respuesta_1' => 'required',
        'respuesta_2' => 'required',
        'respuesta_3' => 'required',
        'respuesta_4' => 'required',
    ], [
        // Mensajes de error personalizados (si los hay)
        'first_name.required' => 'Los nombres son requeridos.',
        'last_name.required' => 'Los apellidos son requeridos.',
        'last_name.regex' => 'Apellido no válido.',
        'date_of_birth.required' => 'La fecha de nacimiento es requerida.',
        'date_of_birth.before' => 'Debes ser mayor de 18 años.',
        'date_of_birth.before_or_equal' => 'Debes ser mayor de 18 años.',
        'nacionalidad.required' => 'La nacionalidad es requerida.',
        'email.required' => 'El email es requerido.',
        'email.unique' => 'El email ya está en uso.',
        'email.email' => 'Por favor, ingresa un email válido.',
        'cedula.required' => 'La cédula es requerida.',
        'cedula.unique' => 'La cédula ya está registrada.',
        'cedula.regex' => 'La cédula debe tener entre 6 y 10 dígitos.',
        'password.required' => 'La contraseña es requerida.',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        'password_confirmation.required' => 'La confirmación de la contraseña es requerida.',
        'password_confirmation.same' => 'Las contraseñas no coinciden.',
        'address.required' => 'La dirección es requerida.',
        'respuesta_1.required' => 'La pregunta 1 es requerida.',
        'respuesta_2.required' => 'La pregunta 2 es requerida.',
        'respuesta_3.required' => 'La pregunta 3 es requerida.',
        'respuesta_4.required' => 'La pregunta 4 es requerida.',
    ]);

    // Crear el usuario
    $user = new User();
    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->date_of_birth = $request->date_of_birth;
    $user->cedula = $request->cedula;
    $user->address = $request->address;
    $user->email = $request->email;
    $user->facebook = $request->facebook;
    $user->instagram = $request->instagram;
    $user->x = $request->x;
    $user->tiktok = $request->tiktok;
    $user->descripcion = $request->descripcion;
    $user->password = bcrypt($request->password);
    $user->nacionalidad_idnacionalidad = $request->nacionalidad;
    $user->save();

    // Obtener el ID del usuario recién creado
    $usersaved = User::orderBy('idusers', 'desc')->first();

    // Guardar las respuestas de seguridad
    $pregunta1 = new Respuesta();
    $pregunta1->users_idusers = $usersaved->idusers;
    $pregunta1->preguntas_idpreguntas = $request->pregunta_1; // Asegúrate de que sea un ID entero válido
    $pregunta1->respuesta = bcrypt($request->respuesta_1); // Ciframos la respuesta
    $pregunta1->save();

    $pregunta2 = new Respuesta();
    $pregunta2->users_idusers = $usersaved->idusers;
    $pregunta2->preguntas_idpreguntas = $request->pregunta_2; // Asegúrate de que sea un ID entero válido
    $pregunta2->respuesta = bcrypt($request->respuesta_2);
    $pregunta2->save();

    $pregunta3 = new Respuesta();
    $pregunta3->users_idusers = $usersaved->idusers;
    $pregunta3->preguntas_idpreguntas = $request->pregunta_3; // Asegúrate de que sea un ID entero válido
    $pregunta3->respuesta = bcrypt($request->respuesta_3);
    $pregunta3->save();

    $pregunta4 = new Respuesta();
    $pregunta4->users_idusers = $usersaved->idusers;
    $pregunta4->preguntas_idpreguntas = $request->pregunta_4; // Asegúrate de que sea un ID entero válido
    $pregunta4->respuesta = bcrypt($request->respuesta_4); // Ciframos la respuesta
    $pregunta4->save();

    // Redirigir al login con un mensaje de éxito
    return redirect()->route('login')->with('success', 'Usuario registrado exitosamente.');
}

    public function loginVerify(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4'
        ], [
            'email.required' => 'El email es requerido.',
            'email.email' => 'El email debe ser una dirección de correo válida.',
            'password.required' => 'La contraseña es requerida.',
            'password.min' => 'La contraseña debe tener al menos 4 caracteres.',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['invalid_credentials' => 'Usuario y/o contraseña incorrecto'])->withInput();
    }


    public function verifyEmail(Request $request)
    {
        // Validar el correo electrónico
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $email = $request->email;

        // Buscar el usuario por su correo electrónico
        $thisuser = User::where('email', $email)->first();
        $user = $thisuser->idusers;
        if (!$thisuser) {
            return redirect()->route('verify')->withErrors('Usuario no encontrado');
        }
        // Almacenar el correo en la sesión

        session(['email' => $thisuser->email]);
        return redirect()->route('questions', ['id' => $user])->with('success', 'Usuario registrado exitosamente.');
    }

    public function questions()
    {
        // Obtener el correo desde la sesión
        $email = session('email');

        if (!$email) {
            return back()->withErrors(['email' => 'No se ha encontrado un correo válido en la sesión.']);
        }

        // Buscar el usuario por correo
        $user = User::where('email', $email)->first();
        // Obtener las preguntas respondidas por este usuario
        $preguntas = $user->preguntas()->get();

        // Retorna los resultados a la vista
        return view('auth.Questions', compact('preguntas'));
    }

    public function verifyQuestions(Request $request)
    {

        $request->validate([

            'respuesta_1' => 'required',
            'respuesta_2' => 'required',
            'respuesta_3' => 'required',
            'respuesta_4' => 'required',
            // Valida que cada respuesta sea una cadena no vacía
        ]);

        $idquestion1 = $request->pregunta_1;
        $idquestion2 = $request->pregunta_2;
        $idquestion3 = $request->pregunta_3;
        $idquestion4 = $request->pregunta_4;
        $idrespuesta1 = $request->respuesta_1;
        $idrespuesta2 = $request->respuesta_2;
        $idrespuesta3 = $request->respuesta_3;
        $idrespuesta4 = $request->respuesta_4;
        //validar pregunta 1

        //dump($idquestion1, $idquestion2, $idquestion3, $idquestion4, $idrespuesta1, $idrespuesta2, $idrespuesta3, $idrespuesta4);

        $respuestaCorrecta1 = Respuesta::where('preguntas_idpreguntas', $idquestion1)
            ->where('respuesta', $idrespuesta1)
            ->exists();

        if (!$respuestaCorrecta1) {
            return back()->withErrors(['invalid_questions' => "La respuesta a la pregunta '{$idquestion1}' es incorrecta."]);
        }
        //validar pregunta 2
        $respuestaCorrecta2 = Respuesta::where('preguntas_idpreguntas', $idquestion2)
            ->where('respuesta', $idrespuesta2)
            ->exists();

        if (!$respuestaCorrecta2) {
            return back()->withErrors(['invalid_questions' => "La respuesta a la pregunta '{$idquestion2}' es incorrecta."]);
        }
        //validar pregunta 3
        $respuestaCorrecta3 = Respuesta::where('preguntas_idpreguntas', $idquestion3)
            ->where('respuesta', $idrespuesta3)
            ->exists();

        if (!$respuestaCorrecta3) {
            return back()->withErrors(['invalid_questions' => "La respuesta a la pregunta '{$idquestion3}' es incorrecta."]);
        }
        //validar pregunta 4
        $respuestaCorrecta4 = Respuesta::where('preguntas_idpreguntas', $idquestion4)
            ->where('respuesta', $idrespuesta4)
            ->exists();

        if (!$respuestaCorrecta4) {
            return back()->withErrors(['invalid_questions' => "La respuesta a la pregunta '{$idquestion4}' es incorrecta."]);
        }

        return redirect()->route('token')->with('success', 'Usuario registrado exitosamente.');
    }

    public function Token()
    {
        // Obtener el correo desde la sesión
        $email = session('email');

        if (!$email) {
            return back()->withErrors(['email' => 'No se ha encontrado un correo válido en la sesión.']);
        }

        // Buscar el usuario por correo
        $user = User::where('email', $email)->first();

        // Generar un código único de 6 caracteres
        $codigo = Str::random(6);
        //dump($email, $codigo, $user);
        // Enviar el código al correo del usuario
        Mail::to($user->email)->send(new \App\Mail\RecoveryCodeMail($codigo));

        /* try {
            Mail::to($user->email)->send(new \App\Mail\RecoveryCodeMail($codigo));
        } catch (\Exception $e) {
            // Maneja el error (puedes registrar el error o mostrar un mensaje)
            dd('Error al enviar el correo: ' . $e->getMessage());
        } */

        // Redirigir al formulario donde el usuario debe ingresar el código

        return view('auth.Token')->with($codigo);
    }

    public function verifyToken(Request $request)
    {
        // Obtiene el token de la solicitud
        $codigouser = $request->codigo;
        $codigosend = $request->codigosend;


        // Valida si el token ingresado coincide con el guardado
        if ($codigouser === $codigosend) {
            return response()->json(['mensaje' => 'Token válido'], 200);
        } else {
            return response()->json(['mensaje' => 'Token inválido'], 401);
        }


        return view('NewPass');
    }

    public function NewPass(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

        // Obtener el correo desde la sesión
        $email = session('email');

        if (!$email) {
            return back()->withErrors(['email' => 'No se ha encontrado un correo válido en la sesión.']);
        }

        // Buscar el usuario por correo
        $user = User::where('email', $email)->first();

        // Actualizar la contraseña
        $user->password = Hash::make($request->password_confirmation);
        $user->save();


        return redirect()->route('dashboard');
    }

    public function signOut(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'session cerrada correctamente');
    }
}
