<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Booking;
use Faker\Generator as Faker;

$factory->define(Booking::class, function (Faker $faker) {

    return [
        'user_id' => $faker->randomDigitNotNull,
        'specialization_id' => $faker->randomDigitNotNull,
        'fee' => $faker->randomDigitNotNull,
        'offer' => $faker->randomDigitNotNull,
        'day' => $faker->randomDigitNotNull,
        'hour' => $faker->word,
        'coupon' => $faker->word,
        'status' => $faker->randomDigitNotNull,
        'code' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
