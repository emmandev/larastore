<?php

use Faker\Generator as Faker;

$factory->define(App\Models\OrderMeta::class, function (Faker $faker) {
    $name = $faker->firstName() . ' ' . $faker->lastName;
    $address = $faker->streetAddress;
    $city = $faker->city;
    $state = $faker->state;
    $postcode = $faker->postcode;
    $country = $faker->country;
    return [
        'customer' => json_encode([
            'name' => $name,
            'email' => $faker->email,
            'phone' => $faker->e164PhoneNumber,
            'company' => $faker->company,
            'ip_address' => $faker->ipv4,
            'user_agent' => $faker->userAgent,
        ]),
        'billing' => json_encode([
            'billing_name' => $name,
            'billing_address_1' => $address,
            'billing_address_2' => '',
            'billing_city' => $city,
            'billing_state' => $state,
            'billing_post_code' => $postcode,
            'billing_country' => $country,
        ]),
        'shipping' => json_encode([
            'shipping_name' => $name,
            'shipping_address_1' => $address,
            'shipping_address_2' => '',
            'shipping_city' => $city,
            'shipping_state' => $state,
            'shipping_post_code' => $postcode,
            'shipping_country' => $country,
            'shipping_price' => 0,
            'shipping_tax' => 0,
            'shipping_discount' => 0,
            'shipping_method' => 0,
        ]),
        'cart' => json_encode([
            'cart_discount' => 0,
            'cart_discount_tax' => 0,
            'cart_quantity' => 0,
            'cart_total' => 0,
            'notes' => '',
            'coupon_code' => '',
            'coupon_discount' => 0,
        ]),
        'payment' => json_encode([
            'total_tax' => 0,
            'total_price' => 0,
            'payment_method' => 0,
            'payment_date' => $faker->date(),
            'currency' => $faker->currencyCode
        ])
    ];
});
