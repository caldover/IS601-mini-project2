<?php

use Faker\Generator as Faker;

$factory->define(App\Car::class, function (Faker $faker) {
    return [
        'make' => $faker -> randomElement(["Ford", "Honda", "Toyota"]),
        'model' => $faker -> randomElement(["Model1", "Model2", "Model3"]),
        'year' => (int)$faker -> randomElement([2016, 2017, 2018])
    ];
});
