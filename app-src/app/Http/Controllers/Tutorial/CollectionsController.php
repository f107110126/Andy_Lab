<?php

namespace App\Http\Controllers\Tutorial;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class CollectionsController extends Controller
{
    public function example()
    {
        $users = User::all(); // this will return a Collection
        $firstOne = $users[0]; // it can be treat like an array
        $firstOne = $users->first(); // cause it is a collection, so it can do this.
        $lastOne = $users->last();
        $whoIs4 = $users->find(4);
        $emailWith = $users->where('email', 'user002@email.com'); // this will return a collection
        $emailWith = $users->where('email', 'user002@email.com')->first(); // this will return a User::class
        $emailSet = $users->pluck('email'); // return collection
        $emailArr = $emailSet->toArray(); // return array
        $nameSet = $users->map(function ($user) {
            return $user->name;
        });
        // for the filter if it receive return value is true, this item will be append to result
        $moreThan3 = $users->filter(function ($user) {
            return $user->id > 3;
        });
        $collected = collect(['ind1' => 'foo', 'bar', 'baz']); // argument is a array just will be fine.
        $upperStr = $collected->map(function ($str) {
            return strtoupper($str);
        });
        // above line is equal to :
        // $upperStr = array_map(function ($item) {
        //     return strtoupper($item);
        // }, ['ind1' => 'foo', 'bar', 'baz']);

        $song1 = (object)['name' => 'something', 'length' => 300];
        $song2 = (object)['name' => 'Foobar', 'length' => 200];
        $song3 = (object)['name' => 'Foobar Buzz', 'length' => 400];
        $songs = collect([$song1, $song2, $song3]);
        $songsNames = $songs->pluck('name');
        $songsLengths = $songs->pluck('length');

        $nums = collect([1, 2, 3]);
        $nums->contains(1); // return true
        $nums->contains(4); // return false
        /*
         *
         */
        $totalLength = 0;
        foreach ($songs as $song) {
            $totalLength += $song->length;
        }
        $totalLength = $songs->sum('length');
        // to have all verified user
        // for the filter, if it received return value is null or false, the item will not be append to result.
        $verified = $users->filter(function ($user) {
            return $user->email_verified_at;
            // return !$user->email_verified_at; // if the value be null, inverse result will be true.
        });

        /*
         * Dynamically access collection proxies.
         * HigherOrderCollectionProxy
         */
        $verified = $users->filter->email_verified_at;
        $isVerified = $users->first()->isVerified();
        $verified = $users->filter(function ($user) {
            return $user->isVerified();
        });
        $verified = $users->filter->isVerified();
        $notVerified = $users->filter->isNotVerified();
        dd($notVerified);
    }
}
