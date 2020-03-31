<?php

use Faker\Generator as Faker;

$factory->define(App\ProductImage::class, function (Faker $faker) {
    return [
        'image' => "https://picsum.photos/id/".$faker->numberBetween(1,1000)."/640/480",
        'product_id' => $faker->numberBetween(1,100)
    ];
});
