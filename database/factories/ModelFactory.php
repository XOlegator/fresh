<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Fresh\EcomRefCurrency::class, function (Faker $faker) {
    return [
        'ctry_nm'      => $faker->country,
        'ccy_nm'       => str_random(10),
        'ccy'          => str_random(3),
        'ccy_nbr'      => $faker->numberBetween(0, 999),
        'ccy_mnr_unts' => $faker->numberBetween(1, 4)
    ];
});
