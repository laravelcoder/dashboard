<?php

$factory->define(App\Location::class, function (Faker\Generator $faker) {
    return [
        "nickname" => $faker->name,
        "address" => $faker->name,
        "address_2" => $faker->name,
        "city" => $faker->name,
        "state" => $faker->name,
        "phone" => $faker->name,
        "phone2" => $faker->name,
        "google_map_link" => $faker->name,
    ];
});
