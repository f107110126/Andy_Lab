<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tweet;
use Faker\Generator as Faker;

$factory->define(Tweet::class, function (Faker $faker) {
    return [
        // 'user_id' => factory(App\User::class),
        'user_id' => rand(1, App\User::count()),
        'body' => $faker->sentence,
    ];
});
