<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Method;
use Faker\Generator as Faker;

$factory->define(Method::class, function (Faker $faker) {

    return [
        'enabled' => $faker->word,
        'name' => $faker->word,
        'public_key' => $faker->word,
        'private_key' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
