<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('user')->latest()->get();
        return view('admin.article.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'status' => 'required|in:draft,published',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        $data['user_id'] = auth()->id();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('article', 'public');
        }

        Article::create($data);

        return redirect()->route('admin.article.index')->with('success', 'Article berhasil ditambahkan');
    }

    public function edit(Article $article)
    {
        return view('admin.article.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'status' => 'required|in:draft,published',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);

        if ($request->hasFile('foto')) {
            if ($article->foto) {
                Storage::disk('public')->delete($article->foto);
            }
            $data['foto'] = $request->file('foto')->store('article', 'public');
        }

        $article->update($data);

        return redirect()->route('admin.article.index')->with('success', 'Article berhasil diperbarui');
    }

    public function destroy(Article $article)
    {
        if ($article->foto) {
            Storage::disk('public')->delete($article->foto);
        }
        $article->delete();
        return redirect()->route('admin.article.index')->with('success', 'Article berhasil dihapus');
    }
}
