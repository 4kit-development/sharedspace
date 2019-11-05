<?php

namespace App\Contracts\Interactions\Listing;

interface StoreImages
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
     * Store listing images.
     *
     * @param  \App\Listing  $listing
     * @param  array  $data
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    public function handle($listing, array $data);
}
