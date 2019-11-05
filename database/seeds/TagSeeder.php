<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'category_id' => 1,
            'title' => 'Coworking',
            'status' => 1,
        ]);

        Tag::create([
            'category_id' => 1,
            'title' => 'Hot Desk',
            'status' => 1,
        ]);

        Tag::create([
            'category_id' => 1,
            'title' => 'Serviced Office',
            'status' => 1,
        ]);

        Tag::create([
            'category_id' => 1,
            'title' => 'Desk Space',
            'status' => 1,
        ]);

        Tag::create([
            'category_id' => 1,
            'title' => 'Office for lease',
            'status' => 1,
        ]);

        Tag::create([
            'category_id' => 1,
            'title' => 'Shared studio',
            'status' => 1,
        ]);

        Tag::create([
            'category_id' => 1,
            'title' => 'Health space',
            'status' => 1,
        ]);

        Tag::create([
            'category_id' => 1,
            'title' => 'Office suite',
            'status' => 1,
        ]);

        Tag::create([
            'category_id' => 1,
            'title' => 'Virtual office',
            'status' => 1,
        ]);
    }
}
