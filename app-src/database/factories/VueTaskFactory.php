<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\VueTask;
use Faker\Generator as Faker;

$factory->define(VueTask::class, function (Faker $faker) {
    return [
        'content' => $faker->paragraph
    ];
});
