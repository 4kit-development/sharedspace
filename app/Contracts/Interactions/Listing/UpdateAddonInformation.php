<?php

namespace App\Contracts\Interactions\Listing;

use App\Listing;

interface UpdateAddonInformation
{
    /**
     * Get a validator instance for the given data.
     *
     * @param  \App\listing $listing
     * @param  array  $data
     * @return \Illuminate\Validation\Validator
     */
    public function validator($listing, array $data);

    /**
     * Update the addons for a listing.
     *
     * @param  \App\listing $listing
     * @param  array  $data
     * @return Listing
     */
    public function handle($listing, array $data);
}

