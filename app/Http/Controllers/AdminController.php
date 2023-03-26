<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $adminRequests = User::where('is_admin', NULL)->get();
        $revisorRequests = User::where('is_revisor', NULL)->get();
        $writerRequests = User::where('is_writer', NULL)->get();

        return view('admin.dashboard', compact('adminRequests', 'revisorRequests', 'writerRequests'));
    }
    // ADMIN
    public function setAdmin(User $user)
    {
        $user->update([
            'is_admin' => true,
            'is_revisor' => true,
            'is_writer' => true,
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'L\'utente scelto è ora amministratore');
    }

    public function rejectAdmin(User $user)
    {
        $user->update([
            'is_admin' => false,
            'is_revisor' => false,
            'is_writer' => false,
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'Richiesta rifiutata correttamente');
    }

    // REVISOR
    public function setRevisor(User $user)
    {
        $user->update([
            'is_revisor' => true,
            'is_writer' => true,
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'L\'utente scelto è ora revisore');
    }

    public function rejectRevisor(User $user)
    {
        $user->update([
            'is_revisor' => false,
            'is_writer' => false,
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'Richiesta rifiutata correttamente');
    }

    // WRITER
    public function setWriter(User $user)
    {
        $user->update([
            'is_writer' => true,

        ]);
        return redirect(route('admin.dashboard'))->with('message', 'L\'utente scelto è ora redattore');
    }

    public function rejectWriter(User $user)
    {
        $user->update([
            'is_writer' => false,
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'Richiesta rifiutata correttamente');
    }

    //TAGS
    public function editTag(Request $request, Tag $tag)
    {
        $request->validate([
            'name'=> 'required|unique:tags',
        ]);

        $tag->update([
            'name'=> strtolower($request->name),
        ]);

        return redirect(route('admin.dashboard'))->with('message', 'Tag modificato correttamente');

    }

    public function deleteTag(Tag $tag)
    {
        foreach($tag->articles as $article){
            $article->tags()->detach($tag);
        }
        $tag->delete();

        return redirect(route('admin.dashboard'))->with('message', 'Tag eliminato correttamente');

    }

    //CATEGORIE
    public function editCategory(Request $request, Category $category)
    {
        $request->validate([
            'name'=> 'required|unique:categories',
        ]);

        $category->update([
            'name'=> strtolower($request->name),
        ]);

        return redirect(route('admin.dashboard'))->with('message', 'Tag modificato correttamente');

    }

    public function deleteCategory(Category $category)
    {
        $category->delete();

        return redirect(route('admin.dashboard'))->with('message', 'Tag eliminato correttamente');

    }

    public function storeCategory(Request $request){
        Category::create([
            'name'=>strtolower($request->name),
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'Categoria creata correttamente');
    }
}
