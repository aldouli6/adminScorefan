<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Accessory;
use Faker\Generator as Faker;

$factory->define(Accessory::class, function (Faker $faker) {

    return [
        'enabled' => $faker->word,
        'user_id' => $faker->word,
        'product_id' => $faker->randomDigitNotNull,
        'category_id' => $faker->randomDigitNotNull,
        'selected' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
