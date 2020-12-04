<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Tweet;

class TweetLikesController extends Controller
{
    public function store(Tweet $tweet)
    {
        $str = collect(explode('/', request()->path()))->last();
        if ($str === 'like') {
            $tweet->like(current_user());
        }
        if ($str === 'dislike') {
            $tweet->dislike(current_user());
        }

        return back();
    }
}
