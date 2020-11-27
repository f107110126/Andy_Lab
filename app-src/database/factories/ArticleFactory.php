<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

// to generate this factory use command:
// php artisan make:factory -m Article ArticleFactory
// and use factory could setup default value like:
// factory(\App\Article::class, 5)->create(['title' => 'override the title']);

$factory->define(Article::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class), // so, when create article, will create user too.
        'title' => $faker->sentence,
        'excerpt' => $faker->sentence,
        'body' => $faker->paragraph,
    ];
});
