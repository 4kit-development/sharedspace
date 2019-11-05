<?php

use App\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'title' => 'Basic',
            'name' => 'basic',
            'description' => 'A basic listing',
            'image' => '',
            'order' => 0,
            'status' => 1
        ]);

        Type::create([
            'title' => 'Premium',
            'name' => 'premium',
            'description' => 'A premium listing',
            'image' => '',
            'order' => 1,
            'status' => 1
        ]);
    }
}
