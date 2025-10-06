<?php

namespace App\Http\Controllers;

use App\Models\Stylebook;

class WelcomeController extends Controller
{
    public function index()
    {
        // Falls die stylebooks-Tabelle (noch) leer ist, ist $latest einfach eine leere Collection
        $latest = Stylebook::with('user')->latest()->limit(8)->get();

        return view('welcome', compact('latest'));
    }
}
