<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SectionSeeder::class);
        $this->call(MetricSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(SuburbSeeder::class);
        $this->call(PlanSeeder::class);
        $this->call(AddonSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(AmenitySeeder::class);
        $this->call(ListingSeeder::class);
    }
}
