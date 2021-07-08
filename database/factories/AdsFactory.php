<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Ads;
use Faker\Generator as Faker;

$factory->define(Ads::class, function (Faker $faker) {

    return [
        'title_en' => $faker->word,
        'title_ar' => $faker->word,
        'image_en' => $faker->word,
        'image_ar' => $faker->word,
        'starting_date' => $faker->word,
        'ending_date' => $faker->word,
        'active' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
