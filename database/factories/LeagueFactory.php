<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\League;
use Faker\Generator as Faker;

$factory->define(League::class, function (Faker $faker) {

    return [
        'enabled' => $faker->word,
        'name' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
