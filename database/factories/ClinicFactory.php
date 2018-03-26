<?php

$factory->define(App\Clinic::class, function (Faker\Generator $faker) {
    return [
        "nickname" => $faker->name,
        "clinic_email" => $faker->safeEmail,
        "clinic_phone" => $faker->name,
        "clinic_phone_2" => $faker->name,
        "company_id" => factory('App\ContactCompany')->create(),
    ];
});
