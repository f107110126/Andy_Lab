<?php

namespace App\Http\Controllers;

class PostsController extends Controller
{
    public function show($post)
    {
        $posts = [
            '1' => 'this is first post.',
            '2' => 'this is second post.',
        ];

        if (!array_key_exists($post, $posts)) {
            abort(404, 'post not found.');
        }

        return ['post' => $posts[$post]];
    }
}
