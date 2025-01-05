<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Publication;
use Illuminate\Http\Request;


class PublicationController extends Controller
{


    public function listaBlog(Request $request)
{
    // Número de publicaciones por página
    $perPage = 5;

    // Obtener las publicaciones paginadas
    $publications = Publication::paginate($perPage);

    // Convertir las fechas a instancias de Carbon (opcional)
    foreach ($publications as $publication) {
        $publication->fecha_creacion = $publication->fecha_creacion ? Carbon::parse($publication->fecha_creacion) : null;
        $publication->fecha_publicacion = $publication->fecha_publicacion ? Carbon::parse($publication->fecha_publicacion) : null;
    }

    // Agrupar las publicaciones por categoría usando la colección ya paginada
    $publicationsByCategory = $publications->getCollection()->groupBy('categoria');

    // Retornar la vista con las publicaciones paginadas y agrupadas por categoría
    return view('blog.listBlog', compact('publications', 'publicationsByCategory'));
}


    // Método para registrar un usuario (sin cambios)
    public function register()
    {
        return view('auth.register');
    }

    // Método para editar una publicación (sin cambios)
    public function edit($id)
    {
        $publication = Publication::findOrFail($id);
        return view('publications.edit', compact('publication'));
    }

    // Método para eliminar una publicación (sin cambios)
    public function destroy($id)
    {
        $publication = Publication::findOrFail($id);
        $publication->delete();

        return redirect()->route('publications')->with('success', 'Publicación eliminada correctamente.');
    }
}
