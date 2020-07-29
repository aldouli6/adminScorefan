<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {

    return [
        'enabled' => $faker->word,
        'name' => $faker->word,
        'img_url' => $faker->word,
        'affect_balance' => $faker->word,
        'pos_x' => $faker->word,
        'pos_y' => $faker->word,
        'height' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
