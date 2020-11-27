<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;

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
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles()->paginate(2);
            $articles->appends(['tag' => request('tag')]); // for let pagination append uri
        } else {
            $articles = Article::latest()->paginate(2);
        }
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        // show a view to create a new resource.
        return view('articles.create', ['tags' => Tag::all()]);
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
        // Article::create($this->validateArticle());

        // version 006
        $article = new Article($this->validateArticle());

        // version 007
        // $this->validateArticle();
        // $article = new Article(request(['title', 'excerpt', 'body']));

        $article->user_id = 1;
        $article->save();

        $article->tags()->attach(request('tags'));

        return redirect('/articles');
    }

    public function edit(Article $article)
    {
        // show a view to edit an existing resource.
        $tags = Tag::all();
        return view('articles.edit', compact(['article', 'tags']));
    }

    public function update(Article $article)
    {
        // alternative find many usage:
        // $articles = Article::findMany([1, 2]); // find article with id = 1 or id = 2
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
        // $article->tags()->attach(request('tags'));
        $new_tags = collect(request('tags'));
        $old_tags = $article->tags->pluck('id');
        $article->tags()->attach($new_tags->diff($old_tags));
        $article->tags()->detach($old_tags->diff($new_tags));
        // dd($new_tags->diff($old_tags), $old_tags->diff($new_tags));

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
            'tags' => 'exists:tags,id',
        ]);
    }
}

// so you can make a resource controller for a given mode
// php artisan make:controller -m [model]
// or just generate a resource controller
// php artisan make:controller -r
