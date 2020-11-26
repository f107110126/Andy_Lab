<?php

namespace App\Http\Controllers;

use App\Article;

class ArticlesController extends Controller
{
    // public function show($articleId)
    // !! notice the variable name "$article" should as same with route/web.php
    // like Route::get('/articles/{article})
    public function show(Article $article)
    {
        // show a single resource.
        // return view('articles.show', ['article' => Article::find($articleId)]);
        // $article = Article::findOrFail($articleId);
        return view('articles.show', compact('article'));
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
        // version 002
        // request()->validate([
        //     'title' => ['required', 'min:3', 'max:255'],
        //     'excerpt' => 'required',
        //     'body' => 'required',
        // ]);

        // // notice use this method, the column's names must
        // // be setup as fillable at model.
        // Article::create([
        //     'title' => request('title'),
        //     'excerpt' => request('excerpt'),
        //     'body' => request('body'),
        // ]);

        // version 003
        // $validatedAttributes = request()->validate([
        //     'title' => ['required', 'min:3', 'max:255'],
        //     'excerpt' => 'required',
        //     'body' => 'required',
        // ]);

        // Article::create($validatedAttributes);

        // version 004
        // Article::create(request()->validate([
        //     'title' => ['required', 'min:3', 'max:255'],
        //     'excerpt' => 'required',
        //     'body' => 'required',
        // ]));

        // version 005
        Article::create($this->validateArticle());

        return redirect('/articles');
    }

    public function edit(Article $article)
    {
        // show a view to edit an existing resource.
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article)
    {
        // persist the edited resource.
        // version 002
        // request()->validate([
        //     'title' => ['required', 'min:3', 'max:255'],
        //     'excerpt' => 'required',
        //     'body' => 'required',
        // ]);

        // $article->title = request('title');
        // $article->excerpt = request('excerpt');
        // $article->body = request('body');

        // $article->save();

        // version 004
        // $article->update(request()->validate([
        //     'title' => ['required', 'min:3', 'max:255'],
        //     'excerpt' => 'required',
        //     'body' => 'required',
        // ]));

        // version 005
        $article->update($this->validateArticle());

        return redirect(route('articles.show', $article));
    }

    public function destory()
    {
        // delete the resource
    }

    // version 005
    protected function validateArticle()
    {
        return request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'excerpt' => 'required',
            'body' => 'required',
        ]);
    }
}

// so you can make a resource controller for a given mode
// php artisan make:controller -m [model]
// or just generate a resource controller
// php artisan make:controller -r
