<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

trait Likable
{
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate(
            ['user_id' => $user ? $user->id : auth()->id()],
            ['liked' => $liked]
        );
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    public function scopeWithLikes(Builder $query)
    {
        // $query->leftJoinSub($query, $as, $first);
        // select * from tweets
        // left join (select tweet_id, sum(liked) likes, sum(!liked) dislies from likes group by tweet_id) likes
        // on likes.tweet_id = tweets.id;
        $query->leftJoinSub(
            'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }

    public function isLikedBy(User $user)
    {
        return (bool) $user->likes->where('tweet_id', $this->id)->where('liked', true)->count();
    }

    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes->where('tweet_id', $this->id)->where('liked', false)->count();
    }

    public function getLikesAttribute($value)
    {
        return $value ?: 0;
    }

    public function getDislikesAttribute($value)
    {
        return $value ?: 0;
    }
}
