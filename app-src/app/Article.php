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
}
