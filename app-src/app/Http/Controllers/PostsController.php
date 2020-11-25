<?php

namespace App\Http\Controllers;

// version 002
// use DB;
// version 003
use App\Post;

class PostsController extends Controller
{
    public function show($slug)
    {
        // version 001
        // $post = \DB::table('posts')->where('slug', $slug)->first();

        // version 002
        // $post = DB::table('posts')->where('slug', $slug)->first();

        // version 003
        // $post = Post::where('slug', $slug)->first();

        // if (!$post) {
        //     abort(404, 'post not found.');
        // }

        // version 004
        // $post = Post::where('slug', $slug)->firstOrFail();

        // return ['post' => $post];

        // version 005
        return ['post' => Post::where('slug', $slug)->firstOrFail()];
    }
}

// to make model use command:
// php artisan make:model Post

// to make migration use command:
// php artisan make:migration create_posts_table

// to migrate table use command:
// php artisan migrate

// for alter table also cound use migration:
// php artisan make:migration add_title_to_posts_table

// for rollback migration use command:
// php artisan migrate:rollback

// for rollback all table and re-create use command:
// php artisan migrate:fresh

// try to get artisan command detail, use command:
// php artisan help [command]

// for generate model, controller, migration in one command
// use command:
// php artisan make:model -rm
// flag c means controller, r means resource controller,
// m means migration
