<?php

use Faker\Generator as Faker;

$factory->define(App\ProductTypeAttribute::class, function (Faker $faker) {
    $name = $faker->sentence(3);

    return [
        'name' => $name,
        'slug' => str_slug($name)
    ];
});
