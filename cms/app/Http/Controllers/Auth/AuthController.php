<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Nacionalidad;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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

    $request->validate([
        'first_name' => 'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
        'last_name' => 'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
        'cedula' => 'required|unique:users,cedula|regex:/^[0-9]{6,10}$/',
        'user_name' => 'required|unique:users,user_name',
        'date_of_birth' => 'required|date|before:today|before_or_equal:today' . now()->subYears(18)->toDateString(),
        'nacionalidad' => 'required',
        'password' => 'required|min:8',
        'password_confirmation' => 'required|same:password',
        'address' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'respuesta_1' => 'required',
        'respuesta_2' => 'required',
        'respuesta_3' => 'required',
        'respuesta_4' => 'required',
    ], [
        'first_name.required' => 'Los nombres son requeridos.',
        'last_name.required' => 'Los apellidos son requeridos.',
        'last_name.regex' => 'Apellido no válido.',
        'user_name.required' => 'El nombre de usuario es requerido.',
        'user_name.unique' => 'El nombre de usuario ya está en uso.',
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
        'respuesta_1.required' => 'La respuesta 1 es requerida.',
        'respuesta_2.required' => 'La respuesta 2 es requerida.',
        'respuesta_3.required' => 'La respuesta 3 es requerida.',
        'respuesta_4.required' => 'La respuesta 4 es requerida.',
    ]);

    // Crear el usuario
    $user = User::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'date_of_birth' => $request->date_of_birth,
        'cedula' => $request->cedula,
        'user_name' => $request->user_name,
        'address' => $request->address,
        'email' => $request->email,
        'facebook' => $request->facebook,
        'instagram' => $request->instagram,
        'x' => $request->x,
        'tiktok' => $request->tiktok,
        'descripcion' => $request->descripcion,
        'password' => bcrypt($request->password),
        'nacionalidad_idnacionalidad' => $request->nacionalidad,
        'roles_idroles' => 2,
    ]);

    // Crear las respuestas de seguridad
    $preguntas = [
        $request->pregunta_1 => $request->respuesta_1,
        $request->pregunta_2 => $request->respuesta_2,
        $request->pregunta_3 => $request->respuesta_3,
        $request->pregunta_4 => $request->respuesta_4
    ];

    foreach ($preguntas as $pregunta_id => $respuesta) {
        Respuesta::create([
            'users_idusers' => $user->idusers,
            'preguntas_idpreguntas' => $pregunta_id,
            'respuesta' => bcrypt($respuesta),
        ]);
    }

    // Redirigir al login con un mensaje de éxito
    return redirect()->route('login')->with('success', 'Usuario registrado exitosamente.');
}

public function loginVerify(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:8'
    ], [
        'email.required' => 'El email es requerido.',
        'email.email' => 'El email debe ser una dirección de correo válida.',
        'password.required' => 'La contraseña es requerida.',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
    ]);

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $user = Auth::user();

        if ($user->role) {
            $role = $user->role->name;
            return redirect()->route('dashboard')->with('success', "Bienvenido, {$user->first_name} {$user->last_name}! Tu rol es de: {$role}.");
        } else {
            return redirect()->route('dashboard')->with('warning', "Bienvenido, {$user->first_name}! No tienes un rol asignado.");
        }
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

    public function updateProfilePicture(Request $request)
{
    // Validación
    $request->validate([
        'user_name' => [
            'nullable',
            'string',
            'max:255',
            Rule::unique('users', 'user_name')->ignore(Auth::user()->idusers, 'idusers'),
        ],
        'address' => 'nullable|string|max:255',
        'email' => [
            'nullable',
            'email',
            'max:255',
            Rule::unique('users', 'email')->ignore(Auth::user()->idusers, 'idusers'),
        ],
    ], [
        'user_name.unique' => 'El nombre de usuario ya está en uso.',
        'email.unique' => 'El correo electrónico ya está registrado.',
        'email.email' => 'El correo electrónico debe ser una dirección válida.',
    ]);

    $user = Auth::user();
    $user->user_name = $request->user_name;
    $user->address = $request->address;
    $user->email = $request->email;
    $user->save();

    return redirect()->route('dashboard')->with('success', 'Perfil actualizado correctamente.');
}




public function destroy()
{
    $user = Auth::user();
    $user->delete();

    Auth::logout();

    return redirect()->route('login')->with('success', 'Tu cuenta ha sido eliminada correctamente.');
}



}
