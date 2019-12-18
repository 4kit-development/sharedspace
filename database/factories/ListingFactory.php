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

$factory->define(App\Listing::class, function (Faker $faker) {
    $suburb = factory(App\Suburb::class)->create();
    $district = factory(\App\District::class)->create();

    return [
        'user_id' => function () {
           return factory(App\User::class)->create()->id;
        },
        'section_id' => 1,
        'category_id' => 1,
        'region_id' => $district->region_id,
        'district_id' => $district->id,
        'suburb_id' => $suburb->id,
        'plan_id' => 1,
        'title' => 'Sharedspace',
        'address' => $faker->address,
        'geocode_lat' => $faker->latitude,
        'geocode_lng' => $faker->longitude,
        'short_description' => 'Perfect Office Space!!',
        'full_description' => 'Large modern warehouse, close to the motorway. Going cheap!',
        'min_area' => null,
        'max_area' => $faker->randomNumber(4),
        'min_capacity' => null,
        'max_capacity' => $faker->randomNumber(4),
        'min_cost' => null,
        'max_cost' => $faker->randomNumber(4),
        'status' => 'enabled',
      ];
});
