<?php

use Faker\Generator as Faker;

$factory->define(App\Specialty::class, function (Faker $faker) {
    $title = $faker->unique()->word(3);
    return [
        'name' => $title
    ];
});
