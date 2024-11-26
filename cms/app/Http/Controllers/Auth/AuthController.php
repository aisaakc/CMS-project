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
            'email' => 'required|unique:users,email',
            'password' => 'required|min:4',
            'password_confirmation' => 'required|same:password'
        ],[
            'email.required' => 'El email es requerido.',
            'email.unique' => 'El email ya está en uso.',
        ]);

        User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password)
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
        return back()->withErrors(['invalid_credentials' => 'Usuario o contraseña no válidos'])->withInput();
    }
}
