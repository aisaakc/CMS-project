<?php

namespace App\Http\Controllers;

use App\Models\Page;

class VisitanteController extends Controller
{
    public function index()
    {
        // Obtenemos solo las páginas con estado 'published', paginadas
        $pages = Page::where('status', 'published')->paginate(3);

        // Retornamos la vista con las páginas filtradas
        return view('visitante.index', compact('pages'));
    }
    public function show($slug)
{
    $page = Page::where('slug', $slug)->firstOrFail();
    return view('visitante.show', compact('page'));
}

}
