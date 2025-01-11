<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PublicationController extends Controller
{

    public function listaBlog(Request $request)
    {
        $perPage = 5;

        // Obtener las publicaciones solo del usuario autenticado
        $publications = Publication::where('users_idusers', Auth::id())->paginate($perPage);

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
    public function create()
    {
        return view('blog/createBlog');
    }
    // Método para editar una publicación (sin cambios)

    public function show($id)
    {
        $publication = Publication::findOrFail($id);
        $publication->fecha_creacion = Carbon::parse($publication->fecha_creacion);
        $publication->fecha_publicacion = $publication->fecha_publicacion ? Carbon::parse($publication->fecha_publicacion) : null;

        return view('blog/showBlog', compact('publication'));
    }

    // Método para crear una nueva publicación
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'fecha_publicacion' => 'required|date',
            'estado' => 'required|string|in:borrador,publicado,programado',
            'categoria' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Crear una nueva publicación
        $publication = new Publication();
        $publication->title = $request->input('title');
        $publication->content = $request->input('content');
        $publication->fecha_publicacion = Carbon::parse($request->input('fecha_publicacion'));
        $publication->fecha_creacion = Carbon::now(); // Establecer la fecha de creación

        $publication->estado = $request->input('estado');
        $publication->categoria = $request->input('categoria');
        $publication->users_idusers = Auth::id(); // Establecer el ID del usuario autenticado

        // Si se sube una imagen, guardar el campo de la imagen
        if ($request->hasFile('image')) {
            $publication->image = $request->file('image')->store('images', 'public');
        }

        // Guardar la nueva publicación
        $publication->save();

        // Redirigir a la lista de publicaciones con un mensaje de éxito
        return redirect()->route('publications')->with('success', 'Publicación creada correctamente.');
    }

    public function uploadImage(Request $request)
    {
        // Validación del archivo de imagen
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Guarda la imagen en el almacenamiento público
        $path = $request->file('image')->store('uploads/images', 'public');

        // Retorna la URL completa para que Summernote pueda usarla
        return response()->json(['url' => asset('storage/' . $path)]);
    }

    // Método para editar una publicación

    public function edit($id)
    {
        $publication = Publication::findOrFail($id);
        $publication->fecha_publicacion = $publication->fecha_publicacion ? Carbon::parse($publication->fecha_publicacion) : null;

        return view('blog/editBlog', compact('publication'));
    }

    // Método para actualizar una publicación
    public function update(Request $request, $id)
    {
        $publication = Publication::findOrFail($id);

        // Validar los datos del formulario
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'fecha_publicacion' => 'required|date',
            'estado' => 'required|string|in:borrador,publicado,programado',
            'categoria' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Actualizar los datos de la publicación
        $publication->title = $request->input('title');
        $publication->content = $request->input('content');
        $publication->fecha_publicacion = Carbon::parse($request->input('fecha_publicacion'));
        $publication->estado = $request->input('estado');
        $publication->categoria = $request->input('categoria');

        // Si se sube una nueva imagen, actualizar el campo de la imagen
        if ($request->hasFile('image')) {
            $publication->image = $request->file('image')->store('images', 'public');
        }

        // Guardar los cambios
        $publication->save();

        // Redirigir a la lista de publicaciones con un mensaje de éxito
        return redirect()->route('publications')->with('success', 'Publicación actualizada correctamente.');
    }

    // Método para eliminar una publicación (sin cambios)
    public function destroy($id)
    {
        $publication = Publication::findOrFail($id);
        $publication->delete();

        return redirect()->route('publications')->with('success', 'Publicación eliminada correctamente.');
    }
}
