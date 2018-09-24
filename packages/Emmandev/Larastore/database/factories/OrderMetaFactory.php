<?php

use Faker\Generator as Faker;

$factory->define(App\Models\OrderMeta::class, function (Faker $faker) {
    return [
        'key' => $faker->word,
        'value' => $faker->word
    ];
});
