<?php

namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'writer', 'verified'])->except('index', 'show', 'byCategory', 'byUser');
    }

    public function index()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:articles|min:5',
            'subtitle' => 'required|unique:articles|min:5',
            'body' => 'required|min:10',
            'image' => 'required|image',
            'category' => 'required',
            'tags' => 'required',

        ]);

        $article = Article::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'image' => $request->file('image')->store('public/images'),
            'category_id' => $request->category,
            'user_id' => Auth::user()->id,
            'slug' => Str::slug($request->title),
        ]);

        $tags = explode(', ', $request->tags);

        foreach ($tags as $tag) {
            $newTag = Tag::updateOrCreate([
                'name' => $tag,
            ]);
            $article->tags()->attach($newTag);
        }

        return redirect(route('homepage'))->with('message', 'Articolo creato correttamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    public function byCategory(Category $category)
    {
        $articles = $category->articles->sortByDesc('created_at')->filter(function ($article) {
            return $article->is_accepted == true;
        });
        return view('article.by-category', compact('category', 'articles'));
    }

    public function byUser(User $user)
    {

        $articles = $user->articles->sortByDesc('created_at')->filter(function ($article) {
            return $article->is_accepted == true;
        });
        return view('article.by-user', compact('articles', 'user'));
    }

    public function ArticleAuth()
    {
        $articles = Auth::user()->articles;
        return view('article.auth', compact('articles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|min:5|unique:articles,title,' . $article->id,
            'subtitle' => 'required|min:5|unique:articles,subtitle,' . $article->id,
            'body' => 'required|min:10',
            'image' => 'image',
            'category' => 'required',
            'tags' => 'required',

        ]);

        $article->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'category' => $request->category,
            'slug' => Str::slug($request->title),
            'is_accepted' => NULL,
        ]);

        if ($request->image) {
            Storage::delete($article->image);
            $article->update([
                'image' => $request->file('image')->store('public/images'),
            ]);
        }
        $tags = explode(', ', $request->tags);
        foreach ($tags as $tag) {

            $newTag = Tag::updateOrCreate([
                'name' => $tag,
            ]);
            $newTags[] = $newTag->id;
        }
        $article->tags()->sync($newTags);

        return redirect()->route('articles.auth')->with(['success' => 'Articolo modificato con successo']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        foreach ($article->tags as $tag) {
            $article->tags()->detach($tag);
        }


        $article->delete();

        return redirect()->route('articles.auth')->with(['success' => 'Articolo eliminato  con successo']);
    }

    public function articleSearch(Request $request)
    {
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.search-index', compact('articles', 'query'));
    }
}
