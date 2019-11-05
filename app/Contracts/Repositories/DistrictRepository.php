<?php

namespace App\Contracts\Repositories;

use App\District;

interface DistrictRepository
{
    /**
     * Get the district matching the given ID.
     *
     * @param  string|int  $id
     * @return District
     */
    public function find($id);

    /**
     * Get all of the listings for a given user.
     *
     * @param  \App\Region
     * @param  string  $name
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByName($region, $name);

    /**
     * Create a new District with a given region.
     *
     * @param  \App\Region  $region
     * @param  string  $name
     * @return District
     */
    public function create($region, $name);
}
