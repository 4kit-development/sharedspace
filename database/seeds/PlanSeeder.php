<?php

use App\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'category_id' => 1,
            'type_id' => 1,
            'period' => 90,
            'price' => 249.00,
            'discount' => 0,
            'status' => 1
        ]);

        Plan::create([
            'category_id' => 1,
            'type_id' => 1,
            'period' => 180,
            'price' => 448.20,
            'discount' => 10,
            'status' => 1
        ]);

        Plan::create([
            'category_id' => 1,
            'type_id' => 1,
            'period' => 360,
            'price' => 697.20,
            'discount' => 30,
            'status' => 1
        ]);

        Plan::create([
            'category_id' => 1,
            'type_id' => 2,
            'period' => 90,
            'price' => 349.00,
            'discount' => 0,
            'status' => 1
        ]);

        Plan::create([
            'category_id' => 1,
            'type_id' => 2,
            'period' => 180,
            'price' => 628.20,
            'discount' => 10,
            'status' => 1
        ]);

        Plan::create([
            'category_id' => 1,
            'type_id' => 2,
            'period' => 360,
            'price' => 977.20,
            'discount' => 30,
            'status' => 1
        ]);

        Plan::create([
            'category_id' => 2,
            'type_id' => 1,
            'period' => 90,
            'price' => 199.00,
            'discount' => 0,
            'status' => 1
        ]);

        Plan::create([
            'category_id' => 2,
            'type_id' => 1,
            'period' => 180,
            'price' => 358.20,
            'discount' => 0,
            'status' => 1
        ]);

        Plan::create([
            'category_id' => 2,
            'type_id' => 1,
            'period' => 360,
            'price' => 557.20,
            'discount' => 0,
            'status' => 1
        ]);

        Plan::create([
            'category_id' => 2,
            'type_id' => 2,
            'period' => 90,
            'price' => 299.00,
            'discount' => 0,
            'status' => 1
        ]);

        Plan::create([
            'category_id' => 2,
            'type_id' => 2,
            'period' => 180,
            'price' => 538.20,
            'discount' => 0,
            'status' => 1
        ]);

        Plan::create([
            'category_id' => 2,
            'type_id' => 2,
            'period' => 360,
            'price' => 837.20,
            'discount' => 0,
            'status' => 1
        ]);
    }
}
