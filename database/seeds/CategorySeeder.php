<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::insert([
            'section_id' => 1,
            'metric_id' => 1,
            'title' => 'Office Space',
            'name' => 'office-space',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
