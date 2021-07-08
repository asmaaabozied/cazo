<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Slider;
use Faker\Generator as Faker;

$factory->define(Slider::class, function (Faker $faker) {

    return [
        'title_en' => $faker->word,
        'title_ar' => $faker->word,
        'description_en' => $faker->word,
        'description_ar' => $faker->word,
        'additional_en' => $faker->word,
        'additional_ar' => $faker->word,
        'forward_type' => $faker->word,
        'forward_id' => $faker->word,
        'discount_percentage' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
