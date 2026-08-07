<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Official;
use App\Models\Potential;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $articles = \App\Models\Article::latest('published_at')->take(3)->get();
        $agendas = \App\Models\Agenda::orderBy('date', 'desc')->take(4)->get();
        return view('welcome', compact('articles', 'agendas'));
    }

    public function profil()
    {
        $profiles = \App\Models\Profile::all()->keyBy('type');
        return view('pages.profil', compact('profiles'));
    }

    public function sotk()
    {
        $officials = \App\Models\Official::orderBy('order_number')->get();
        return view('pages.sotk', compact('officials'));
    }

    public function lingkungan()
    {
        $lingkungans = \App\Models\Lingkungan::all();
        return view('pages.lingkungan', compact('lingkungans'));
    }

    public function potensi()
    {
        $potentials = \App\Models\Potential::latest()->get();
        return view('pages.potensi', compact('potentials'));
    }

    public function kkn()
    {
        return view('pages.kkn');
    }

    public function berita()
    {
        $articles = \App\Models\Article::latest('published_at')->paginate(9);
        return view('pages.berita', compact('articles'));
    }

    public function beritaShow($slug)
    {
        $article = \App\Models\Article::where('slug', $slug)->firstOrFail();
        return view('pages.berita_show', compact('article'));
    }
}
