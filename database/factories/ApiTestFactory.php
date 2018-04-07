<?php

$factory->define(App\ApiTest::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "subject" => $faker->name,
        "message" => $faker->name,
        "submitted_user_city" => $faker->name,
        "submitted_user_state" => $faker->name,
        "searched_for" => $faker->name,
        "email" => $faker->name,
    ];
});
