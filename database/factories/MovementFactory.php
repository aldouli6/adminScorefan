<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Movement;
use Faker\Generator as Faker;

$factory->define(Movement::class, function (Faker $faker) {

    return [
        'description' => $faker->word,
        'product_id' => $faker->randomDigitNotNull,
        'movement' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
