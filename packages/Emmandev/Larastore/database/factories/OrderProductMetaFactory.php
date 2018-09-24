<?php

use Faker\Generator as Faker;

$factory->define(App\Models\OrderProductMeta::class, function (Faker $faker) {
    return [
        'key' => $faker->word,
        'value' => $faker->word
    ];
});
