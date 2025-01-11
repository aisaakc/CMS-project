<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Mostrar el formulario de contacto
    public function showForm()
    {
        return view('cms.Contactanos');
    }

    public function store(Request $request)
{
    // Validar los datos del formulario
    $validatedData = $request->validate([
        'nombre' => 'required|string|max:255',
        'telefono' => 'required|string|max:255',  // Validar teléfono como string
        'mensaje' => 'required|string',
    ]);

    // Preparar los datos para insertar en la tabla de comentarios
    $commentData = [
        'full_name' => $validatedData['nombre'],
        'phone' => $validatedData['telefono'],  // Guardar el número de teléfono
        'coment' => $validatedData['mensaje'],
    ];



    // Crear el comentario en la base de datos
    Comment::create($commentData);

    // Redirigir con mensaje de éxito
    return redirect()->route('Contactanos')->with('success', 'Comentario enviado exitosamente.');
}





}
