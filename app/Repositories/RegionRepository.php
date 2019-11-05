<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Region;
use App\Contracts\Repositories\RegionRepository as RegionRepositoryContract;

class RegionRepository implements RegionRepositoryContract
{
    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Region::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function findByName($name)
    {
        return Region::all()->where('title', $name)->first();
    }

    /**
     * {@inheritdoc}
     */
    public function create($name)
    {
        $attributes = [
            'title' => $name,
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        return Region::firstOrCreate(['title' => $name], $attributes);
    }
}
