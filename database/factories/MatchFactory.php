<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Match;
use Faker\Generator as Faker;

$factory->define(Match::class, function (Faker $faker) {

    return [
        'state_id' => $faker->randomDigitNotNull,
        'team_local_id' => $faker->randomDigitNotNull,
        'team_visitor_id' => $faker->randomDigitNotNull,
        'round_id' => $faker->randomDigitNotNull,
        'date_time' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
