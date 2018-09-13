<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ProductType::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'description' => $faker->text()
    ];
});
