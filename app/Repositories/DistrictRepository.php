<?php

namespace App\Repositories;

use App\District;
use Carbon\Carbon;
use App\Contracts\Repositories\DistrictRepository as DistrictRepositoryContract;

class DistrictRepository implements DistrictRepositoryContract
{
    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return District::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function findByName($name, $region)
    {
        return District::all()->where('title', $name)->where('region_id', $region->id)->first();
    }

    /**
     * {@inheritdoc}
     */
    public function create($region, $name)
    {
        $attributes = [
            'title' => $name,
            'region_id' => $region->id,
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        return District::firstOrCreate(['title' => $name, 'region_id' => $region->id], $attributes);
    }
}
