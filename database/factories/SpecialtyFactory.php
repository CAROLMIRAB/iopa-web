<?php

use Faker\Generator as Faker;

$factory->define(App\Specialty::class, function (Faker $faker) {
    $title = $faker->unique()->word(5);
    return [
        'name' => $title,
    ];
});
