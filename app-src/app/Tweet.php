<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    // version 005
    use Likable;
    
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // // version 001, 002
    // // public function like()
    // // version 003
    // // public function like($liked = true)
    // // version 004
    // public function like($user = null, $liked = true)
    // {
    //     // version 001
    //     // $this->likes()->create([
    //     //     'user_id' => auth()->id(),
    //     //     'liked' => true,
    //     // ]);

    //     // version 002
    //     // $this->likes()->updateOrCreate(
    //     //     ['user_id' => auth()->id()],
    //     //     ['liked' => true]
    //     // );

    //     // version 003
    //     // $this->likes()->updateOrCreate(
    //     //     ['user_id' => auth()->id()],
    //     //     ['liked' => $liked]
    //     // );

    //     // version 004
    //     $this->likes()->updateOrCreate(
    //         ['user_id' => $user ? $user->id : auth()->id()],
    //         ['liked' => $liked]
    //     );
    // }

    // // version 001, 002, 003
    // // public function dislike()
    // public function dislike($user = null)
    // {
    //     // version 001
    //     // $this->likes()->create([
    //     //     'user_id' => auth()->id(),
    //     //     'liked' => false,
    //     // ]);

    //     // version 002
    //     // $this->likes()->updateOrCreate(
    //     //     ['user_id' => auth()->id()],
    //     //     ['liked' => false]
    //     // );

    //     // version 003
    //     // return $this->like(false);

    //     // version 004
    //     return $this->like($user, false);
    // }

    // public function isLikedBy(User $user)
    // {
    //     // return $this->likes()->where('user_id', $user->id)->exists();
    //     return (bool) $user->likes->where('tweet_id', $this->id)->where('liked', true)->count();
    // }

    // public function isDislikedBy(User $user)
    // {
    //     return (bool) $user->likes->where('tweet_id', $this->id)->where('liked', false)->count();
    // }

    // public function likes()
    // {
    //     return $this->hasMany(Like::class);
    // }
}
