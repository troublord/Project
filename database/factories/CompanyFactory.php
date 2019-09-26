<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'company_name' => $faker->company,
        'company_contact' => $faker->name,
        'company_phone' => $faker->tollFreePhoneNumber,
        'company_address'=> $faker->streetAddress,
    ];
});