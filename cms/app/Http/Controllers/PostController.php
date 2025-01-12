<?php


namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        // Obtener todos los publicadores (usuarios con el rol Publisher)
        $publishers = User::whereHas('role', function ($query) {
            $query->where('name', 'Publisher');
        })->get();

        // Obtener el id del publicador desde la solicitud (si está presente)
        $publisherId = $request->input('publisher_id');

        // Construir la consulta de publicaciones
        $query = Publication::with('user')
            ->whereHas('user.role', function ($query) {
                $query->where('name', 'Publisher');
            });

        // Filtrar por publicador si se selecciona uno
        if ($publisherId) {
            $query->where('users_idusers', $publisherId);
        }

        // Filtrar por estado (Publicado, Borrador, Programado)
        $publishedPosts = clone $query;
        $draftPosts = clone $query;
        $scheduledPosts = clone $query;

        // Obtener publicaciones por estado
        $posts = [
            'Publicado' => $publishedPosts->where('estado', 'publicado')->paginate(5, ['*'], 'published_page'),
            'Borrador' => $draftPosts->where('estado', 'borrador')->paginate(5, ['*'], 'draft_page'),
            'Programado' => $scheduledPosts->where('estado', 'programado')->paginate(5, ['*'], 'scheduled_page'),
        ];

        // Retornar la vista con las publicaciones y publicadores
        return view('post.lista', compact('publishers', 'posts'));
    }
    // Método para mostrar los detalles de una publicación
    public function show($id)
    {
        // Obtener la publicación por su ID
        $publication = Publication::with('user')->findOrFail($id);

        // Retornar la vista de la publicación con los detalles
        return view('post.show', compact('publication'));
    }
}

