<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Condition;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        
        $query = Article::query()->with(['category', 'condition']);

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('condition_id')) {
            $query->where('condition_id', $request->condition_id);
        }

        $articles = $query->latest()->get();

        $categories = Category::all();
        $conditions = Condition::all();

        return view('articles.index', compact('articles', 'categories', 'conditions'));

    }

    public function create()
    {
        
        $categories = Category::all();
        $conditions = Condition::all();

        return view('articles.create', compact('categories', 'conditions'));
    }

    public function store(ArticleRequest $request)
    {
    
    
        Article::create($request->validated());

        
        return redirect()->route('articles.index')->with('success', 'Artículo creado correctamente.');
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        $conditions = Condition::all();

        return view('articles.edit', compact('article', 'categories', 'conditions'));
    }

    public function update(ArticleRequest $request, Article $article)
    {

        $article->update($request->validated());

        return redirect()->route('articles.index')->with('success', 'Artículo actualizado correctamente.');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Artículo eliminado correctamente.');
    }
}
