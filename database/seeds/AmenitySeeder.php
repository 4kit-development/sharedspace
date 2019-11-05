<?php

use App\Amenity;
use Illuminate\Database\Seeder;

class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Amenity::create([
            'category_id' => 1,
            'title' => 'High speed internet',
            'icon' => 'fa fa-wifi',
            'status' => 1
        ]);
        Amenity::create([
            'category_id' => 1,
            'title' => 'Coffee/tea',
            'icon' => 'fa fa-coffee',
            'status' => 1
        ]);
        Amenity::create([
            'category_id' => 1,
            'title' => 'Receptionist',
            'icon' => 'fa fa-headset',
            'status' => 1
        ]);
        Amenity::create([
            'category_id' => 1,
            'title' => '24/7 access',
            'icon' => 'fa fa-clock',
            'status' => 1
        ]);
        Amenity::create([
            'category_id' => 1,
            'title' => 'Lockers',
            'icon' => 'fa fa-lock',
            'status' => 1
        ]);

    }
}
