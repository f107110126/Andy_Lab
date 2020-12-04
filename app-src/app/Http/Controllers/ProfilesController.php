<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\User;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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

    public function update(User $user)
    {
        $attributes = request()->validate([
            'username' => ['string', 'required', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user)],
            'avatar' => ['file'],
            'name' => ['string', 'required', 'max:255'],
            'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed'],
        ]);
        if (request('avatar')) {
            $attributes['avatar'] = 'uploads/' . request('avatar')->store('avatars', 'upload');
        }

        // $attributes['password'] = Hash::make($attributes['password']);
        $user->update($attributes);
        return redirect($user->path());
    }
}
