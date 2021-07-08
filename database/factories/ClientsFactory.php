<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Clients::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'email' => $faker->word,
        'password' => $faker->word,
        'birth_date' => $faker->word,
        'phone_number' => $faker->word,
        'image' => $faker->word,
        'gender' => $faker->randomElement(['Male', 'Female']),
        'google_id' => $faker->word,
        'facebook_id' => $faker->word,
        'twitter_id' => $faker->word,
        'role_id' => $faker->randomDigitNotNull,
        'firebase_token' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
