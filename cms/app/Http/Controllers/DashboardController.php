<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Publication;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener la cantidad de usuarios con el rol de 'Publisher' (idroles == 2)
        $publisherCount = User::where('roles_idroles', 2)->count();

        // Obtener la cantidad total de publicaciones creadas
        $publicationCount = Publication::count();

        // Retornar la vista con las variables
        return view('vistas.dashboard', compact('publisherCount', 'publicationCount'));
    }
}

