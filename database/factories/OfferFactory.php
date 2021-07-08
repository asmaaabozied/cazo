<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Offer;
use Faker\Generator as Faker;

$factory->define(Offer::class, function (Faker $faker) {

    return [
        'specialization_id' => $faker->randomDigitNotNull,
        'offer_type' => $faker->randomDigitNotNull,
        'offer_value' => $faker->word,
        'starting_date' => $faker->word,
        'ending_date' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
