<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Order::class, function (Faker $faker) {
    return [
        'status' => $faker->numberBetween(1, 3)
    ];
});
