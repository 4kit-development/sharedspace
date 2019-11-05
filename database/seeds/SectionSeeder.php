<?php

use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Section::insert([
            'title' => 'Work',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Section::insert([
            'title' => 'Play',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
