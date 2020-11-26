<?php

namespace App\Http\Controllers;

use App\Article;

class ArticlesController extends Controller
{
    public function show($articleId)
    {
        return view('articles.show', ['article' => Article::find($articleId)]);
    }

    public function index() {
        // return view('articles.index', ['articles' => Article::latest()->simplePaginate(2)]);
        return view('articles.index', ['articles' => Article::latest()->paginate(2)]);
    }
}
