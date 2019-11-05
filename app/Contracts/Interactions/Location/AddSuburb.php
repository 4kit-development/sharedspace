<?php

namespace App\Contracts\Interactions\Location;

use App\Suburb;

interface AddSuburb
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
     * @param  \App\District $district
     * @param  string $name
     * @return Suburb
     */
    public function handle($district, $name);
}

