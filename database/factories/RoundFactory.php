<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Round;
use Faker\Generator as Faker;

$factory->define(Round::class, function (Faker $faker) {

    return [
        'enabled' => $faker->word,
        'name' => $faker->word,
        'date_time_limit' => $faker->word,
        'league_id' => $faker->randomDigitNotNull,
        'tournament_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
