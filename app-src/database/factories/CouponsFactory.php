<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tutorial\Coupon;
use Faker\Generator as Faker;

$factory->define(Coupon::class, function (Faker $faker) {
    return [
        'code' => $faker->numberBetween(1000, 9999),
        'description' => $faker->paragraph,
        'discount' => $faker->numberBetween(10, 99)
    ];
});
