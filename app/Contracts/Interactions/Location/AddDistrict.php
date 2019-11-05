<?php

namespace App\Contracts\Interactions\Location;

use App\District;

interface AddDistrict
{
    /**
     * Get a validator instance for the given data.
     *
     * @param  array  $data
     * @return \Illuminate\Validation\Validator
     */
    public function validator(array $data);

    /**
     * Check and create region.
     *
     * @param  \App\Region $region
     * @param  string $name
     * @return District
     */
    public function handle($region, $name);
}

