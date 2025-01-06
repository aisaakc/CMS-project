<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Nacionalidad;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    // Mostrar lista de usuarios
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Mostrar formulario de creación de usuario
    public function create()
    {
        $nacionalidades = Nacionalidad::all();
        $roles = Role::all();

        return view('users.create', compact('nacionalidades', 'roles'));
    }


    // Guardar nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
            'last_name' => 'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
            'cedula' => 'required|unique:users,cedula|regex:/^[0-9]{6,10}$/',
            'user_name' => 'required|unique:users,user_name',
            'date_of_birth' => 'required|date|before:today|before_or_equal:today',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'nacionalidad_idnacionalidad' => 'required|integer',
            'roles_idroles' => 'required|integer',
        ]);

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
        'password' =>  bcrypt($request->password),
        'nacionalidad_idnacionalidad' => $request->nacionalidad_idnacionalidad,  // Agregar nacionalidad
        'roles_idroles' => $request->roles_idroles,  // Agregar rol
       ]);

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
    }

    // Mostrar usuario específico
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    // Mostrar formulario de edición de usuario
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $nacionalidades = Nacionalidad::all();
        return view('users.edit', compact('user', 'nacionalidades'));
    }

    // Actualizar usuario
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'cedula' => 'required|integer',
            'user_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'x' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'password' => 'nullable|string|min:8|confirmed',
            'nacionalidad_idnacionalidad' => 'required|integer',
            'roles_idroles' => 'required|integer',
        ]);

        $user = User::findOrFail($id);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->cedula = $request->input('cedula');
        $user->user_name = $request->input('user_name');
        $user->address = $request->input('address');
        $user->email = $request->input('email');
        $user->facebook = $request->input('facebook');
        $user->instagram = $request->input('instagram');
        $user->x = $request->input('x');
        $user->tiktok = $request->input('tiktok');
        $user->descripcion = $request->input('descripcion');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->nacionalidad_idnacionalidad = $request->input('nacionalidad_idnacionalidad');
        $user->roles_idroles = $request->input('roles_idroles');
        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    // Eliminar usuario
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
