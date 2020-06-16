<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {

    return [
        'description' => $faker->word,
        'method_id' => $faker->randomDigitNotNull,
        'state_id' => $faker->randomDigitNotNull,
        'user_id' => $faker->word,
        'product_id' => $faker->randomDigitNotNull,
        'total' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
