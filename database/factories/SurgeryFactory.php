<?php

use Faker\Generator as Faker;

$factory->define(App\Surgery::class, function (Faker $faker) {
    $title = $faker->sentence(4);
    return [
        'name' => $title,
        'slug' => str_slug($title),
        'body' => $faker->text(500),
        'file' => $faker->imageUrl($width = 800, $height = 800),
        'status' => $faker->randomElement(array('DRAFT','PUBLISHED')),

    ];
});
