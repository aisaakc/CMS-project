<?php

namespace App\Http\Controllers;

use App\Models\Publication;


use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function listaBlog()
    {
        return view('blog/listBlog');
    }

    public function register()
    {
        return view('auth.register');
    }
}
