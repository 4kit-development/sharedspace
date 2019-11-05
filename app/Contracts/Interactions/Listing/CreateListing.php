<?php

namespace App\Contracts\Interactions\Listing;

use App\Listing;

interface CreateListing
{
    /**
     * Get a validator instance for the given data.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $data
     * @return \Illuminate\Validation\Validator
     */
    public function validator($user, array $data);

    /**
     * Create a new listing.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $data
     * @return Listing
     */
    public function handle($user, array $data);
}

