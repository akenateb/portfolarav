<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
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
    public function store(ArticleRequest $request):RedirectResponse
    {
        $validated = $request->safe()->only(["title","content","category_id"]);

        Article::create($validated);

        session()->flash("success", __("El artículo ha sido creado correctamente"));

        return redirect(route('welcome'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article):Renderable
    {
        $article->load("user:id,name","category:id,name");
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article):Renderable
    {

        $titlehead = __("Editando Articulo");
        $action = route("articles.update",["article"=>$article]);

        return view('articles.manage',compact("titlehead","article","action"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $validated = $request->safe()->only(["title","content","category_id"]);

        $article->update($validated);

        session()->flash("success", __("El artículo ha sido actualizado correctamente"));
        return redirect(route('welcome'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        session()->flash("success", __("El artículo ha sido borrado correctamente"));
        return redirect(route('welcome'));
    }
}
