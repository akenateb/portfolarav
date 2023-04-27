<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
    }

    public function index(){

        $articles = Article::with("category")->OrderByDesc("created_at")->paginate();
        return view('articles.list',compact("articles"));
    }
}
