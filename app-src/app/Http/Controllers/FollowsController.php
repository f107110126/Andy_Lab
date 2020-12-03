<?php

namespace App\Http\Controllers;

use App\User;

class FollowsController extends Controller
{
    public function store(User $user)
    {
        // have the auth'd user follow the given user
        // if (auth()->user()->following($user)) {
        //     auth()->user()->unfollow($user);
        // } else {
        //     auth()->user()->follow($user);
        // }
        current_user()->toggleFollow($user);
        return back();
    }
}
