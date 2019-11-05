<?php

namespace App\Repositories;

use App\Suburb;
use Carbon\Carbon;
use App\Contracts\Repositories\SuburbRepository as SuburbRepositoryContract;

class SuburbRepository implements SuburbRepositoryContract
{
    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Suburb::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function findByName($district, $name)
    {
        return Suburb::all()->where('title', $name)->where('district_id', $district->id)->first();
    }

    /**
     * {@inheritdoc}
     */
    public function create($district, $name)
    {
        $attributes = [
            'title' => $name,
            'district_id' => $district->id,
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        return Suburb::firstOrCreate(['title' => $name, 'district_id' => $district->id], $attributes);
    }
}
