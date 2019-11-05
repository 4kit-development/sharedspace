<?php

namespace App\Contracts\Repositories;

use App\Region;

interface RegionRepository
{
    /**
     * Get the region matching the given ID.
     *
     * @param  string|int  $id
     * @return Region
     */
    public function find($id);

    /**
     * Get the region matching the given name.
     *
     * @param  string  $name
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByName($name);

    /**
     * Create a new region.
     *
     * @param  string  $name
     * @return Region
     */
    public function create($name);
}
