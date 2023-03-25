<?php

namespace App\Http\Controllers;

use App\Mail\CareerRequestMail;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function homepage()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(4)->get();
        return view('welcome', compact('articles'));
    }

    public function careers()
    {
        return view('careers');
    }

    public function careersSubmit(Request $request)
    {

        $request->validate([
            'role' => 'required',
            'name' => 'required|alpha',
            'surname' => 'required|alpha',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        $user = Auth::user();
        $role = $request->role;
        $name = $request->name;
        $surname = $request->surname;
        $email = $request->email;
        $message = $request->message;


        Mail::to('admin@theaulabpost.it')->send(new CareerRequestMail(compact('role', 'name', 'surname', 'email', 'message')));

        switch ($role) {
            case 'admin':
                $user->is_admin = NULL;
                break;

            case 'revisor':
                $user->is_revisor = NULL;
                break;

            case 'writer':
                $user->is_writer = NULL;
                break;
        }
        $user->update();

        return redirect(route('homepage'))->with('message', 'Grazie per averci contattato! la tua richiesta verrà gestita nel più breve tempo possibile, intanto goditi tutto quello che il nostro sito può offrirti');
    }
}
