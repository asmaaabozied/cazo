<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Clinic;
use Faker\Generator as Faker;

$factory->define(Clinic::class, function (Faker $faker) {

    return [
        'name_en' => $faker->word,
        'name_ar' => $faker->word,
        'description_en' => $faker->text,
        'description_ar' => $faker->text,
        'category_id' => $faker->randomDigitNotNull,
        'subcategory_id' => $faker->randomDigitNotNull,
        'region_id' => $faker->randomDigitNotNull,
        'suburbs_id' => $faker->randomDigitNotNull,
        'address' => $faker->word,
        'image' => $faker->word,
        'contact_email' => $faker->word,
        'phone_number' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
