<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Prediction;
use Faker\Generator as Faker;

$factory->define(Prediction::class, function (Faker $faker) {

    return [
        'state_id' => $faker->randomDigitNotNull,
        'user_id' => $faker->word,
        'match_id' => $faker->randomDigitNotNull,
        'prediction_local' => $faker->randomDigitNotNull,
        'prediction_visitor' => $faker->randomDigitNotNull,
        'points' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
