<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\InformativeData;
use Faker\Generator as Faker;

$factory->define(InformativeData::class, function (Faker $faker) {

    return [
        'contact_email' => $faker->word,
        'phone_number' => $faker->word,
        'about_en' => $faker->text,
        'about_ar' => $faker->text,
        'privecy_en' => $faker->text,
        'privecy_ar' => $faker->text,
        'terms_conditions_en' => $faker->word,
        'terms_conditions_ar' => $faker->word,
        'facebook_link' => $faker->word,
        'instagram_link' => $faker->word,
        'twitter_link' => $faker->word,
        'snapchat_link' => $faker->word,
        'default_fee' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
