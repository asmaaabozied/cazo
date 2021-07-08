<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Coupon;
use Faker\Generator as Faker;

$factory->define(Coupon::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'count_of_use' => $faker->randomDigitNotNull,
        'code' => $faker->word,
        'start_date' => $faker->word,
        'end_date' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
