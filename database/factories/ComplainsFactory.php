<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Complains;
use Faker\Generator as Faker;

$factory->define(Complains::class, function (Faker $faker) {

    return [
        'type_id' => $faker->randomDigitNotNull,
        'message' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
