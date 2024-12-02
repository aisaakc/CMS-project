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
            'first_name' => 'required|string|max:255', 'max:255', 'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', 
            'last_name' => 'required|string|max:255', 'max:255', 'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',  
            'cedula' => 'required|unique:users,cedula|regex:/^[0-9]{6,10}$/', 
            'date_of_birth' => 'required|date|before:today'.now()->subYears(18)->toDateString(),
            'password' => 'required|min:8|confirmed', 
            'password_confirmation' => 'required',  
            'address' => 'required|string|max:255', 
            'email' => 'required|email|unique:users,email',  
            'pregunta-1' => 'required|string|max:255',  
            'pregunta-2' => 'required|string|max:255',  
            'pregunta-3' => 'required|string|max:255',  
            'pregunta-4' => 'required|string|max:255',  
            'facebook' => 'required|nullable|url',  
            'x' => 'required|nullable|url',  
            'instagram' => 'required|nullable|url', 
            'tiktok' => 'required|nullable|url',  
            'descripcion' => 'required|string|max:500',  
        ], [
            'first_name.required' => 'Los nombres son requerida.',
            'first_name.regex' => 'Nombre no válido.',
            'last_name.required' => 'Los apelldidos son requerida.',
            'last_name.regex' => 'Apellido no válido.',
            'date_of_birth.required'=>'La fecha de nacimiento es requerida.',
            'email.required' => 'El email es requerido.',
            'email.unique' => 'El email ya está en uso.',
            'email.email' => 'Por favor, ingrese un email válido.',
            'cedula.required' => 'La cédula es requerida.',
            'cedula.unique' => 'La cédula ya está registrada.',
            'cedula.regex' => 'La cédula debe contener solo números y tener entre 6 y 10 dígitos.',
            'password.required' => 'La contraseña es requerida.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password_confirmation.required' => 'La confirmación de la contraseña es requerida.',
            'address.required' => 'La dirección es requerida.',
            'descripcion.required' => 'La descripción es requerida.',
            'descripcion.max' => 'La descripción no puede tener más de 500 caracteres.',
            'pregunta-1.required' => 'La pregunta 1 es requerida.',
            'pregunta-2.required' => 'La pregunta 2 es requerida.',
            'pregunta-3.required' => 'La pregunta 3 es requerida.',
            'pregunta-4.required' => 'La pregunta 4 es requerida.',
            'date_of_birth.before' => 'Debe ser mayor de 18 años.',
            'facebook.required' => 'El Facebook es requerido',
            'x.required' => 'El X es requerido',
            'tiktok.required' => 'El Tik-tok es requerido',
            'instagram.required' => 'El Instagram es requerido'
        ]);
        
    
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'cedula' => $request->cedula,
            'date_of_birth' => $request->date_of_birth,
            'nationality' => $request->nationality,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'pregunta_1' => $request->pregunta_1,
            'pregunta_2' => $request->pregunta_2,
            'pregunta_3' => $request->pregunta_3,
            'pregunta_4' => $request->pregunta_4,
            'facebook' => $request->facebook,
            'x' => $request->x,
            'instagram' => $request->instagram,
            'tiktok' => $request->tiktok,
            'descripcion' => $request->descripcion,
        ]);
    
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
