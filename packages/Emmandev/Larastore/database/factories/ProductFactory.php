<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    $name = $faker->sentence(3);
    $slug = str_slug($name);
    return [
        'name' => $name,
        'description' => $faker->text(),
        'sku' => $faker->bothify('sku-' . $slug . '-##??##?'),
        'slug' => $slug,
        'price' => $faker->randomFloat(2, 100, 5000),
        'stock' => $faker->numberBetween(0, 50),
        'status' => $faker->numberBetween(0, 2)
    ];
});
