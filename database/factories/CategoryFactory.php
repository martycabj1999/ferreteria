<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->word),
        'image' => "https://picsum.photos/id/".$faker->numberBetween(1,1000)."/640/480",
        'description' => $faker->sentence(10),
        'state_id' => 1
    ];
});
