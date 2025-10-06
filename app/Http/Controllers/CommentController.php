<?php

namespace App\Http\Controllers;

use App\Models\{Comment, Stylebook, Article};
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // POST /stylebooks/{stylebook}/comments
    public function storeForStylebook(Request $r, Stylebook $stylebook)
    {
        $data = $r->validate(['text' => ['required','string','max:2000']]);

        Comment::create([
            'user_id'      => $r->user()->id,
            'stylebook_id' => $stylebook->id,
            'text'         => $data['text'],
        ]);

        return back()->with('status','Comment posted.');
    }

    // POST /articles/{article}/comments
    public function storeForArticle(Request $r, Article $article)
    {
        $data = $r->validate(['text' => ['required','string','max:2000']]);

        Comment::create([
            'user_id'    => $r->user()->id,
            'article_id' => $article->id,
            'text'       => $data['text'],
        ]);

        return back()->with('status','Comment posted.');
    }

    // DELETE /comments/{comment}
    public function destroy(Comment $comment)
    {
        $user = request()->user();

        $ownsTarget =
            ($comment->stylebook && $comment->stylebook->user_id === $user->id) ||
            ($comment->article   && $comment->article->author_id === $user->id);

        abort_unless($comment->user_id === $user->id || $ownsTarget, 403);

        $comment->delete();

        return back()->with('status','Comment deleted.');
    }
}
