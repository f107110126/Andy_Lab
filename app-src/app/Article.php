<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'excerpt', 'body'];
    // Article::create(request()->all()); // active

    // protected $guarded = []; // been setup as here the rest columns will be fillable

    // public function getRouteKeyName() {
    //     return 'slug'; // Article::where('slug', $article)->first();
    // }

    public function path()
    {
        return route('articles.show', $this);
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function author()
    {
        // return $this->belongsTo(User::class); // this will try to find author from users by author_id
        return $this->belongsTo(User::class, 'user_id'); // this will try to find author from users by user_id
    }

    public function tags()
    {
        // return $this->belongsToMany(Tag::class);
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
    // after migrate, could be used like this
    // $article->tags->pluck('name');
}
