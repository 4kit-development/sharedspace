<?php

use App\Metric;
use Illuminate\Database\Seeder;

class MetricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Metric::create([
            'area_label' => 'M2',
            'area_specification' => 'm2',
            'capacity_label' => 'People',
            'capacity_specification' => 'people',
            'cost_label' => 'Per month',
            'cost_specification' => 'Per month',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
