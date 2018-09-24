<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Order::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return App\Models\User::inRandomOrder()->first()->id;
        },
        'status' => $faker->numberBetween(1, 3)
    ];
});
