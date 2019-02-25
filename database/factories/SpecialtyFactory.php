<?php

use Faker\Generator as Faker;

$factory->define(App\Specialty::class, function (Faker $faker) {
    $title = $faker->unique()->word(3);
    return [
        'name' => $title,
        'slug' => str_slug($title),
        'body' => $faker->text(500),
        'status' => $faker->randomElement(array('DRAFT','PUBLISHED')),
        'file' => $faker->imageUrl($width = 1200, $height = 800)
    ];
});
