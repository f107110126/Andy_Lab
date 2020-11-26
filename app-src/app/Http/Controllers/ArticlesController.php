<?php

namespace App\Http\Controllers;

use App\Article;

class ArticlesController extends Controller
{
    public function show($articleId)
    {
        // show a single resource.
        return view('articles.show', ['article' => Article::find($articleId)]);
    }

    public function index()
    {
        // Render a list of a resource.
        // return view('articles.index', ['articles' => Article::latest()->simplePaginate(2)]);
        return view('articles.index', ['articles' => Article::latest()->paginate(2)]);
    }

    public function create()
    {
        // show a view to create a new resource.
        return view('articles.create');
    }

    public function store()
    {
        // persist the new resource
        // return request()->all();
        // version 001
        request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'excerpt' => 'required',
            'body' => 'required',
        ]);

        $article = new Article();

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles');
    }

    public function edit($articleId)
    {
        // show a view to edit an existing resource.
        $article = Article::find($articleId);
        return view('articles.edit', compact('article'));
    }

    public function update($articleId)
    {
        // persist the edited resource.
        request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'excerpt' => 'required',
            'body' => 'required',
        ]);
        
        $article = Article::find($articleId);

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();
        return redirect('/articles/' . $article->id);
    }

    public function destory()
    {
        // delete the resource
    }
}

// so you can make a resource controller for a given mode
// php artisan make:controller -m [model]
// or just generate a resource controller
// php artisan make:controller -r
