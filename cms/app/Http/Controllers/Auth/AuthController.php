<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Nacionalidad;
use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'password' => 'required|min:8|confirmed',
            'confirm_password' => 'required',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'pregunta-1' => 'required',
            'pregunta-2' => 'required',
            'pregunta-3' => 'required',
            'pregunta-4' => 'required',
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
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'confirm_password.required' => 'La confirmación de la contraseña es requerida.',
            'address.required' => 'La dirección es requerida.',
            'descripcion.required' => 'La descripción es requerida.',
            'descripcion.max' => 'La descripción no puede tener más de 50 caracteres.',
            'pregunta-1.required' => 'La pregunta 1 es requerida.',
            'pregunta-2.required' => 'La pregunta 2 es requerida.',
            'pregunta-3.required' => 'La pregunta 3 es requerida.',
            'pregunta-4.required' => 'La pregunta 4 es requerida.',
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

        $pregunta1 = new Respuesta();
        $pregunta1->users_idusers = $request->idusers;
        $pregunta1->preguntas_idpreguntas = $request->pregunta - 1;
        $pregunta1->respuesta = $request->respuesta - 1;
        $pregunta1->save();
        $pregunta2 = new Respuesta();
        $pregunta2->users_idusers = $request->idusers;
        $pregunta2->preguntas_idpreguntas = $request->pregunta - 2;
        $pregunta2->respuesta = $request->respuesta - 2;
        $pregunta2->save();
        $pregunta3 = new Respuesta();
        $pregunta3->users_idusers = $request->idusers;
        $pregunta3->preguntas_idpreguntas = $request->pregunta - 3;
        $pregunta3->respuesta = $request->respuesta - 3;
        $pregunta3->save();
        $pregunta4 = new Respuesta();
        $pregunta4->users_idusers = $request->idusers;
        $pregunta4->preguntas_idpreguntas = $request->pregunta - 4;
        $pregunta4->respuesta = $request->respuesta - 4;
        $pregunta4->save();
        dd($user, $pregunta1, $pregunta2, $pregunta3, $pregunta4);
        dump($user);
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

    public function signOut(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'session cerrada correctamente');
    }
}
