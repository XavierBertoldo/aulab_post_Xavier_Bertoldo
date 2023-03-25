<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function dashboard()
    {

        $unrevisionedArticles = Article::where('is_accepted', NULL)->get();
        $acceptedArticles = Article::where('is_accepted', true)->get();
        $rejectedArticles = Article::where('is_accepted', false)->get();
        return view('revisor.dashboard', compact('unrevisionedArticles', 'acceptedArticles', 'rejectedArticles'));
    }

    // ACCEPT
    public function acceptArticle(Article $article)
    {
        $article->update([
            'is_accepted' => true,
        ]);
        return redirect(route('revisor.dashboard'))->with('message', 'Articolo accettato correttamente');
    }

    // REJECT
    public function rejectArticle(Article $article)
    {
        $article->update([
            'is_accepted' => false,
        ]);
        return redirect(route('revisor.dashboard'))->with('message', 'Articolo rifiutato correttamente');
    }

    // REJECT
    public function undoArticle(Article $article)
    {
        $article->update([
            'is_accepted' => NULL,
        ]);
        return redirect(route('revisor.dashboard'))->with('message', 'Articolo nuovamente in fase di revisione');
    }
}
