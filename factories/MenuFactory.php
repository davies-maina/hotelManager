<?php

use Faker\Generator as Faker;



$factory->define(App\Menu::class, function (Faker $faker) {

	$faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
    return [
        'name'=>$faker->foodName(),
        'description'=>$faker->paragraphs(2,true),
        'price'=>$faker->numberBetween(99,999),
        'resto_id'=>1,
        'category_id'=>1,
    ];
});
