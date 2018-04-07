<?php

$factory->define(App\Booking::class, function (Faker\Generator $faker) {
    return [
        "submitted" => $faker->date("m/d/Y", $max = 'now'),
        "customername" => $faker->name,
        "email" => $faker->safeEmail,
        "phone" => $faker->name,
        "family_number" => $faker->name,
        "how_long" => $faker->name,
        "requested_date" => $faker->date("m/d/Y", $max = 'now'),
        "requested_time" => $faker->date("H:i:s", $max = 'now'),
        "requested_clinic" => $faker->name,
        "clinic_id" => $faker->name,
        "clinic_email" => $faker->name,
        "clinic_address" => $faker->name,
        "clinic_phone" => $faker->name,
        "clinic_text_numbers" => $faker->name,
        "client_firstname" => $faker->name,
        "submitted_user_city" => $faker->name,
        "submitted_user_state" => $faker->name,
        "searched_for" => $faker->name,
    ];
});
