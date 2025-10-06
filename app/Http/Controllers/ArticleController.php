<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function landing()
    {
        $latest = Article::with('author')
            ->where('is_public', true)
            ->latest()
            ->paginate(12);

        return view('articles.landing', compact('latest'));
    }
}
