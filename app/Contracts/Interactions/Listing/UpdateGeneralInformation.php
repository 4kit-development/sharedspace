<?php

namespace App\Contracts\Interactions\Listing;

use App\Listing;

interface UpdateGeneralInformation
{
    /**
     * Get a validator instance for the given data.
     *
     * @param  \App\Listing  $listing
     * @param  array  $data
     * @return \Illuminate\Validation\Validator
     */
    public function validator($listing, array $data);

    /**
     * Update a listing.
     *
     * @param  \App\Listing  $listing
     * @param  array  $data
     * @return Listing
     */
    public function handle($listing, array $data);
}

