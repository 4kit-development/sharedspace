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

$factory->define(App\Category::class, function (Faker $faker) {

    return [
        'section_id' => 1,
        'metric_id' => 1,
        'title' => 'Office Space',
        'name' => 'office-space',
        'status' => 1
    ];
});
