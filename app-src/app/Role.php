<?php

namespace App;

// use Illuminate\Database\Eloquent\Collection;
// use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    public function abilities()
    {
        return $this->belongsToMany(Ability::class)->withTimestamps();
    }

    public function allowTo($abilities)
    {
        // !!! if use Illuminate\Support\Collection at this class
        // must add 'use ...' at top of file, out of class.
        // if (is_a($ability, Illuminate\Support\Collection::class)) {...}
        // this will not work, because it will not understand
        // what is 'Illuminate\Support\Collection'
        // if (is_a($ability, Collection::class)) {
        //     if (is_a($ability->first(), Ability::class)) {
        //         $this->abilities()->saveMany($ability);
        //     } else {
        //         // print 'this is not a Ability Collection';
        //     }
        // } else {
        //     // print 'this is not a Collection Object';
        // }
        // if (is_a($ability, Ability::class)) {
        //     $this->abilities()->save($ability);
        // }
        if (is_string($abilities)) {
            $abilities = Ability::whereName($abilities)->firstOrFail();
        }

        $this->abilities()->sync($abilities, false);
    }
}
