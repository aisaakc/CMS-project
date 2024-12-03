<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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

    public function registerVerify(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
            'last_name' => 'required|string|max:255|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
            'cedula' => 'required|unique:users,cedula|regex:/^[0-9]{6,10}$/',
            'date_of_birth' => ['required', 'date', function ($attribute, $value, $fail) {
                $age = Carbon::parse($value)->age;
                if ($age < 18) {
                    $fail('Debes ser mayor de 18 años.');
                }
            }],
            'nationality' => 'required',
            'password' => 'required|min:8|confirmed',
            'confirm_password' => 'required',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'pregunta-1' => 'required|string|max:255',
            'pregunta-2' => 'required|string|max:255',
            'pregunta-3' => 'required|string|max:255',
            'pregunta-4' => 'required|string|max:255',
            'facebook' => 'nullable|url',
            'x' => 'nullable|url',
            'instagram' => 'nullable|url',
            'tiktok' => 'nullable|url',
            'descripcion' => 'required|string|max:50',
        ], [
            'first_name.required' => 'Los nombres son requeridos.',
            'last_name.required' => 'Los apellidos son requeridos.',
            'last_name.regex' => 'Apellido no válido.',
            'date_of_birth.required' => 'La fecha de nacimiento es requerida.',
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
            'date_of_birth.before' => 'Debes ser mayor de 18 años.',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'cedula' => $request->cedula,
            'date_of_birth' => $request->date_of_birth,
            'nacionalidad_idnacionalidad' => $request->nationality,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'x' => $request->x,
            'tiktok' => $request->tiktok,
            'descripcion' => $request->descripcion,
        ]);
      
        for ($i = 1; $i <= 4; $i++) {
            Respuesta::create([
                'users_idusers' => $user->idusers,
                'preguntas_idpreguntas' => $request->input("pregunta-$i"),
                'respuesta' => $request->input("respuesta-$i"),
            ]);
        }

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
        return redirect()->route('login')->with('success','session cerrada correctamente');
    }
}
