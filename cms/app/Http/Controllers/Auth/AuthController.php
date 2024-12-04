<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Nacionalidad;
use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'facebook' => 'required',
            'x' => 'required',
            'instagram' => 'required',
            'tiktok' => 'required',
            'descripcion' => 'required|string|max:50',
        ], [
            'first_name.required' => 'Los nombres son requeridos.',
            'last_name.required' => 'Los apellidos son requeridos.',
            'last_name.regex' => 'Apellido no válido.',
            'date_of_birth.required' => 'La fecha de nacimiento es requerida.',
            'date_of_birth.before' => 'Debes ser mayor de 18 años.',
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
            'descripcion.required' => 'La descripción es requerida.',
            'descripcion.max' => 'La descripción no puede tener más de 50 caracteres.',
            'pregunta-1.required' => 'La pregunta 1 es requerida.',
            'pregunta_2.required' => 'La pregunta 2 es requerida.',
            'pregunta_3.required' => 'La pregunta 3 es requerida.',
            'pregunta_4.required' => 'La pregunta 4 es requerida.',
            'facebook.required' => 'Su cuenta de facebook es requerida.',
            'x.required' => 'Su cuenta de x es requerida.',
            'instagram.required' => 'Su cuenta de instagram es requerida.',
            'tiktok.required' => 'Su cuenta de tiktok es requerida.',
        ]);

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

        $usersaved = User::orderBy('idusers', 'desc')->first();


        $pregunta1 = new Respuesta();
        $pregunta1->users_idusers = $usersaved->idusers;
        $pregunta1->preguntas_idpreguntas = $request->pregunta_1;
        $pregunta1->respuesta = $request->respuesta_1;
        $pregunta1->save();


        $pregunta2 = new Respuesta();
        $pregunta2->users_idusers = $usersaved->idusers;
        $pregunta2->preguntas_idpreguntas = $request->pregunta_2;
        $pregunta2->respuesta = $request->respuesta_2;
        $pregunta2->save();

        $pregunta3 = new Respuesta();
        $pregunta3->users_idusers = $usersaved->idusers;
        $pregunta3->preguntas_idpreguntas = $request->pregunta_3;
        $pregunta3->respuesta = $request->respuesta_3;
        $pregunta3->save();

        $pregunta4 = new Respuesta();
        $pregunta4->users_idusers = $usersaved->idusers;
        $pregunta4->preguntas_idpreguntas = $request->pregunta_4;
        $pregunta4->respuesta = $request->respuesta_4;
        $pregunta4->save();


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


        // Obtener las preguntas respondidas por este usuario
        $preguntas = $thisuser->preguntas()->get();



        // Retorna los resultados a la vista
        return view('auth.Questions', compact('preguntas'));
    }




    public function verifyQuestions(Request $request)
    {
        $request->validate([
            'respuestas' => 'required|array',
            'respuestas.*' => 'required|string', // Valida que cada respuesta sea una cadena no vacía
        ]);

        foreach ($request->input('respuestas') as $pregunta_id => $respuesta) {
            $pregunta = Pregunta::find($pregunta_id);

            if (!$pregunta) {
                return back()->withErrors(["La pregunta con ID {$pregunta_id} no existe."]);
            }

            // Validar la respuesta
            $respuestaCorrecta = Respuesta::where('pregunta_id', $pregunta_id)
                ->where('respuesta', $respuesta)
                ->exists();

            if (!$respuestaCorrecta) {
                return back()->withErrors(["La respuesta a la pregunta '{$pregunta->texto}' es incorrecta."]);
            }
        }
        // Llamar al método para enviar el código de recuperación
        return view('Token', compact('preguntas'));
    }

    public function Token(Request $request)
    {
        // Obtener el correo desde la sesión
        $email = session('email');

        if (!$email) {
            return back()->withErrors(['email' => 'No se ha encontrado un correo válido en la sesión.']);
        }

        // Buscar el usuario por correo
        $user = User::where('email', $email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'El correo no está registrado.']);
        }

        // Generar un código único de 6 caracteres
        $codigo = Str::random(6);

        // Guardar el código y la fecha de expiración en la base de datos
        $user->recovery_code = $codigo;
        $user->recovery_code_expires_at = Carbon::now()->addMinutes(15); // Expira en 15 minutos
        $user->save();

        // Enviar el código al correo del usuario
        Mail::to($user->email)->send(new \App\Mail\RecoveryCodeMail($codigo));

        // Redirigir al formulario donde el usuario debe ingresar el código
        return redirect()->route('verify.token')->with('success', 'Se ha enviado un código de recuperación a tu correo.');
    }

    public function verifyToken(Request $request)
    {
        // Almacenar el token en la base de datos (puedes crear una tabla para esto)

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),
            'user_id' => $user,
        ]);
        // Generar un token único para el restablecimiento de la contraseña
        $token = Str::random(60);
        // Enviar el correo electrónico con el enlace para restablecer la contraseña
        Mail::send('auth.emails.reset_password', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Restablecer tu contraseña');
        });

        $nacionalidades = Nacionalidad::all();

        $preguntas = Pregunta::all();

        return view('auth.tokenEmail', compact('nacionalidades', 'preguntas'));
    }







    public function signOut(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'session cerrada correctamente');
    }
}
