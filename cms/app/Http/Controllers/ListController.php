<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Publication;

class ListController extends Controller
{
    public function listPost(Request $request)
    {

        $publishers = User::whereHas('role', function ($query) {
            $query->where('name', 'Publisher');
        })->get();

        $publisherId = $request->input('publisher_id');
        $query = Publication::with('user')->whereHas('user.role', function ($query) {
            $query->where('name', 'Publisher');
        });

        if ($publisherId) {
            $query->where('users_idusers', $publisherId); // Cambié 'user_id' por 'users_idusers' para usar el nombre correcto de la columna
        }

        // Separar las publicaciones por estado
        $publishedPosts = clone $query;
        $draftPosts = clone $query;

        $posts = [
            'Publicado' => $publishedPosts->where('estado', 'publicado')->paginate(5, ['*'], 'published_page'),
            'Borrador' => $draftPosts->where('estado', 'borrador')->paginate(5, ['*'], 'draft_page'),
        ];

        // Retornar la vista con los datos
        return view('vistas.list-post', compact('publishers', 'posts'));
    }
}
