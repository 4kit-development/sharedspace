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

$factory->define(App\Plan::class, function (Faker $faker) {

    return [
        'category_id' => 1,
        'type_id' => 1,
        'period' => 90,
        'price' => 249.00,
        'discount' => 0,
        'status' => 1
    ];
});
