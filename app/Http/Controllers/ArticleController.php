<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected Article $article;
    protected array $articles = [];
    /**
     * Display a listing of the resource.
     */
    public function index():Renderable
    {

        $articles = Article::with("category")->latest("created_at")->get();
        return view('articles.list',compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $article = new Article();
        $titlehead = __("Creando Articulo");
        $action = route("articles.store");
        return view('articles.manage', compact("article","titlehead","action"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        echo "pepe";
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
