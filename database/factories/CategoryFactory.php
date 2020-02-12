<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->word),
        'description' => $faker->sentence(10)
    ];
});
