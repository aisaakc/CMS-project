<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class PublicadorController extends Controller
{
    public function index()
    {
        $publishers = User::where('roles_idroles', 2)->get();
        return view('vistas.publicadores', compact('publishers'));

        return view('vistas.publicadores');
    }
}
