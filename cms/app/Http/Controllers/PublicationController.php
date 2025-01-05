<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\Publication;


use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function listaBlog()
    {
        $publications = Publication::all();
        // Convertir las fechas a instancias de Carbon
        foreach ($publications as $publication) {
            $publication->fecha_creacion = Carbon::parse($publication->fecha_creacion);
            $publication->fecha_publicacion = $publication->fecha_publicacion ? Carbon::parse($publication->fecha_publicacion) : null;
        }

        return view('blog/listBlog', compact('publications'));
    }

    public function register()
    {
        return view('auth.register');
    }
    // Método para editar una publicación
    public function edit($id)
    {
        $publication = Publication::findOrFail($id);
        return view('publications.edit', compact('publication'));
    }

    // Método para eliminar una publicación
    public function destroy($id)
    {
        $publication = Publication::findOrFail($id);
        $publication->delete();

        return redirect()->route('publications')->with('success', 'Publicación eliminada correctamente.');
    }
}
