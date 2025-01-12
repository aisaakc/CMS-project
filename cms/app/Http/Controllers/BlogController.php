<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;

class BlogController extends Controller
{
    public function showBlog()
    {
        // Obtener todas las publicaciones paginadas
        $publications = Publication::where('estado', 'publicado')->paginate(6); // Mostrar 6 publicaciones por página
        return view('cms.Blog', compact('publications'));
    }

    public function showPublication($id)
    {
        // Obtener la publicación por ID
        $publication = Publication::findOrFail($id);

        // Pasar la publicación a la vista
        return view('cms.Publication', compact('publication'));
    }
}
