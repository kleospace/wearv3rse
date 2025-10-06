<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function landing()
    {
        $latest = Article::with('author')->where('is_public', true)->latest()->paginate(12);
        return view('articles.landing', compact('latest'));
    }

    public function show(Article $article)
    {
        abort_if(!$article->is_public && auth()->id() !== $article->author_id, 403);
        $article->load('author');
        return view('articles.show', compact('article'));
    }
}
