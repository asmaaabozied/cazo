<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FAQ;
use Faker\Generator as Faker;

$factory->define(FAQ::class, function (Faker $faker) {

    return [
        'question_en' => $faker->word,
        'question_ar' => $faker->word,
        'answer_en' => $faker->text,
        'answer_ar' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
