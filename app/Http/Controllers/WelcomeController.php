<?php

namespace App\Http\Controllers;

use App\Models\{Stylebook, Article};

class WelcomeController extends Controller
{
    public function index()
    {
        $stylebooks = Stylebook::with('user')->latest()->take(6)->get();
        $articles   = Article::with('author')->where('is_public', true)->latest()->take(6)->get();

        return view('welcome', compact('stylebooks','articles'));
    }
}
