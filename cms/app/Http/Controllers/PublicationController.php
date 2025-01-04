<?php

namespace App\Http\Controllers;

use App\Models\Publication;


use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function listaBlog()
    {
        $publications = Publication::all();

        return view('blog/listBlog', compact('publications'));
    }

    public function register()
    {
        return view('auth.register');
    }
}
