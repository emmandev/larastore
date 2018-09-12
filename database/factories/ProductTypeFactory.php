<?php

use Faker\Generator as Faker;

$factory->define(App\ProductType::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'description' => $faker->text()
    ];
});
