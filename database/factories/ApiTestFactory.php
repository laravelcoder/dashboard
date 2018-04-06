<?php

$factory->define(App\ApiTest::class, function (Faker\Generator $faker) {
    return [
        "submitted_user_city" => $faker->name,
        "submitted_user_state" => $faker->name,
        "name" => $faker->name,
        "subject" => $faker->name,
        "message" => $faker->name,
        "created_by_id" => factory('App\User')->create(),
    ];
});
