<?php
// filepath: /c:/Users/user/Desktop/CMS-project/cms/app/Http/Controllers/PageController.php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Page;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    // Mostrar lista de páginas
    public function index(Request $request)
{

    $status = $request->query('status', 'all');

    $query = Page::query();
    if ($status !== 'all') {
        $query->where('status', $status);
    }

    $pages = $query->paginate(5);

    return view('pages.index', compact('pages', 'status'));
}


    // Mostrar formulario de creación de página
    public function create()
    {

        return view('pages.create');
    }



public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string',
        'content' => 'required',
        'status' => 'required|in:draft,published,archived',
    ]);

    // Generar el slug automáticamente a partir del título
    $slug = Str::slug($request->input('title'));

    // Verificar que el slug sea único en la base de datos
    $originalSlug = $slug;
    $counter = 1;
    while (Page::where('slug', $slug)->exists()) {
        $slug = $originalSlug . '-' . $counter;
        $counter++;
    }

    // Obtener el ID del usuario autenticado
    $userId = Auth::id();

    // Crear la nueva página y asignar el ID del usuario
    Page::create([
        'title' => $request->input('title'),
        'slug' => $slug,
        'content' => $request->input('content'),
        'status' => $request->input('status'),
        'users_idusers' => $userId,
    ]);

    return redirect()->route('pages.index')->with('success', 'Página creada correctamente.');
}




    // Mostrar página específica
   // filepath: /c:/Users/user/Desktop/CMS-project/cms/app/Http/Controllers/PageController.php

        // Método show en el controlador
public function show($id)
{
    $page = Page::with('user')->findOrFail($id);  // Cambié 'users' a 'user' para que coincida con el nombre de la relación
    return view('pages.show', compact('page'));
}



    // Mostrar formulario de edición de página
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('pages.edit', compact('page'));
    }

    // Actualizar página
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|string|in:draft,published,archived',
        ]);

        $page = Page::findOrFail($id);
        $page->title = $request->input('title');
        $page->content = $request->input('content');
        $page->slug = Str::slug($request->input('slug'));
        $page->status = $request->input('status');
        $page->save();

        return redirect()->route('pages.index')->with('success', 'Página actualizada correctamente.');
    }

    // Eliminar página
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return redirect()->route('pages.index')->with('success', 'Página eliminada correctamente.');
    }
}
