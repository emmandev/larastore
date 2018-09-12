<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    $name = $faker->sentence(3);

    return [
        'name' => $name,
        'description' => $faker->text(),
        'sku' => $faker->bothify('sku-##??##?'),
        'slug' => str_slug($name),
        'price' => $faker->numberBetween(100, 5000),
        'stock' => $faker->numberBetween(0, 50)
    ];
});
