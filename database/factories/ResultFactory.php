<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Result;
use Faker\Generator as Faker;

$factory->define(Result::class, function (Faker $faker) {

    return [
        'match_id' => $faker->randomDigitNotNull,
        'result_local' => $faker->randomDigitNotNull,
        'result_visitor' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
