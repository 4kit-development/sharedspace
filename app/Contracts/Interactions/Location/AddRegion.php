<?php

namespace App\Contracts\Interactions\Location;

use App\Region;

interface AddRegion
{
    /**
     * Get a validator instance for the given data.
     *
     * @param  string  $name
     * @return \Illuminate\Validation\Validator
     */
    public function validator($name);

    /**
     * Check and create region.
     *
     * @param  string  $name
     * @return Region
     */
    public function handle($name);
}

