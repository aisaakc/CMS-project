<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Publication;
use App\Models\Page; // Agregar el modelo Page

class DashboardController extends Controller
{
    public function index()
    {

        $publicationCount = Publication::count();
        $pagesCount = Page::count(); // Contar el número de páginas

        // Retornar la vista con las variables
        return view('vistas.dashboard', compact('publicationCount', 'pagesCount'));
    }
}
