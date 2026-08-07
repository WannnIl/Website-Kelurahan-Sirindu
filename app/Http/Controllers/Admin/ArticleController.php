<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = \App\Models\Article::latest('published_at')->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $data['slug'] = \Illuminate\Support\Str::slug($data['title']) . '-' . time();
        $data['published_at'] = now();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        \App\Models\Article::create($data);
        return redirect()->route('admin.articles.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $article = \App\Models\Article::findOrFail($id);
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, string $id)
    {
        $article = \App\Models\Article::findOrFail($id);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $data['slug'] = \Illuminate\Support\Str::slug($data['title']) . '-' . $article->id;

        if ($request->hasFile('image')) {
            if ($article->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($article->image);
            }
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($data);
        return redirect()->route('admin.articles.index')->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $article = \App\Models\Article::findOrFail($id);
        if ($article->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($article->image);
        }
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Berita berhasil dihapus');
    }
}
