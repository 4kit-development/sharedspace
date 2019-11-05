<?php

use App\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::create([
            'id' => 1,
            'title' => 'Northland',
            'status' => 1
        ]);


        Region::create([
            'id' => 2,
            'title' => 'Auckland',
            'status' => 1
        ]);


        Region::create([
            'id' => 3,
            'title' => 'Waikato',
            'status' => 1
        ]);


        Region::create([
            'id' => 4,
            'title' => 'Bay of Plenty',
            'status' => 1
        ]);


        Region::create([
            'id' => 5,
            'title' => 'Gisborne',
            'status' => 1
        ]);


        Region::create([
            'id' => 6,
            'title' => 'Hawkes Bay',
            'status' => 1
        ]);


        Region::create([
            'id' => 7,
            'title' => 'Taranaki',
            'status' => 1
        ]);


        Region::create([
            'id' => 8,
            'title' => 'Manawatu-Whanganui',
            'status' => 1
        ]);


        Region::create([
            'id' => 9,
            'title' => 'Wellington',
            'status' => 1
        ]);


        Region::create([
            'id' => 10,
            'title' => 'Tasman',
            'status' => 1
        ]);


        Region::create([
            'id' => 11,
            'title' => 'Nelson',
            'status' => 1
        ]);


        Region::create([
            'id' => 12,
            'title' => 'Marlborough',
            'status' => 1
        ]);


        Region::create([
            'id' => 13,
            'title' => 'West Coast',
            'status' => 1
        ]);


        Region::create([
            'id' => 14,
            'title' => 'Canterbury',
            'status' => 1
        ]);


        Region::create([
            'id' => 15,
            'title' => 'Otago',
            'status' => 1
        ]);


        Region::create([
            'id' => 16,
            'title' => 'Southland',
            'status' => 1
        ]);
    }
}
