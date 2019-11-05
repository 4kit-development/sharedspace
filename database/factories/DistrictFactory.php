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

$factory->define(App\District::class, function (Faker $faker) {
    return [
        'region_id' => 1,
        'title' => $faker->city,
        'status' => 1
    ];
});
