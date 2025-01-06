<?php
// filepath: /c:/Users/user/Desktop/CMS-project/cms/app/Http/Controllers/PageController.php

namespace App\Http\Controllers;

use App\Models\Page;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    // Mostrar lista de páginas
    public function index()
    {
        $pages = Page::all();
        return view('pages.index', compact('pages'));
    }

    // Mostrar formulario de creación de página
    public function create()
    {
        return view('pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'slug' => 'required|string|unique:pages',
            'status' => 'required|in:draft,published,archived',
        ]);

        Page::create($request->all());
        return redirect()->route('pages.index')->with('success', 'Page created successfully.');
    }

    // Mostrar página específica
    public function show($id)
    {
        $page = Page::findOrFail($id);
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
        $page->slug = Str::slug($request->input('title'));
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
