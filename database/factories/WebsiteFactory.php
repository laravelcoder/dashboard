<?php

$factory->define(App\Website::class, function (Faker\Generator $faker) {
    return [
        "website" => $faker->name,
    ];
});
