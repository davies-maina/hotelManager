<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
	$faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
    return [
        'name'=>$faker->vegetableName,
        'resto_id'=>1,
    ];
});
