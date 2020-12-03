<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', compact('user'));
    }

    public function edit(User $user)
    {
        // if (current_user()->isNot($user)) abort(404);
        // abort_if(current_user()->isNot($user), 404);
        // $this->authorize('edit', $user);
        // setup at 'routes/web.php'
        return view('profiles.edit', compact('user'));
    }
}
