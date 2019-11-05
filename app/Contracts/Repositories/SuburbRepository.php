<?php

namespace App\Contracts\Repositories;

use App\Suburb;

interface SuburbRepository
{
    /**
     * Get the listing matching the given ID.
     *
     * @param  string|int  $id
     * @return Suburb
     */
    public function find($id);

    /**
     * Get all of the listings for a given user.
     *
     * @param  \App\District  $district
     * @param  string $name
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByName($district, $name);

    /**
     * Create a new suburb with a given district.
     *
     * @param  \App\District $district
     * @param  string  $name
     * @return Suburb
     */
    public function create($district, $name);
}
