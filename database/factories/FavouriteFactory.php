<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Favourite;
use Faker\Generator as Faker;

$factory->define(Favourite::class, function (Faker $faker) {

    return [
        'user_id' => $faker->randomDigitNotNull,
        'specialization_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
