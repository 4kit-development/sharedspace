<?php

use App\Addon;
use Illuminate\Database\Seeder;

class AddonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Addon::create([
            'title' => 'Sharedspace Social Promotion',
            'description' => 'Custom creative Facebook adverts.Targeted campaign setup. 
                                $200 spend on Facebook marketing
                                Campaing performance report
                                One email newsletter feature
                                One Facebook post
                                One LinkedIn post
                                One Twitter post',
            'icon' => 'fa fa-facebook',
            'price' => 249.00,
            'status' => 1
        ]);
    }
}
