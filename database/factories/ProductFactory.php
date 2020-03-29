<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word(3),
        'description' => $faker->sentence(10),
        'long_description' => $faker->text,
        'price' => $faker->randomFloat(2, 5, 150),
        'state_id' => $faker->numberBetween(1,3),
        'category_id' => $faker->numberBetween(1,5),
        'featured' => $faker->numberBetween(0,1)
    ];
});
