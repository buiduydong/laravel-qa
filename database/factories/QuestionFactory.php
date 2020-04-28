<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'body' => $faker->paragraph,
        'answers' => $faker->randomDigit,
        'views' => $faker->randomDigit,
        'votes' => $faker->randomDigit,
    ];
});
