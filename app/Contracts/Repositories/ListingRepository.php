<?php

namespace App\Contracts\Repositories;

use App\Listing;

interface ListingRepository
{
    /**
     * Get the listing matching the given ID.
     *
     * @param  string|int  $id
     * @return Listing
     */
    public function find($id);

    /**
     * Get all of the listings for a given user.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function forUser($user);

    /**
     * Create a new listing with the given owner.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $data
     * @return Listing
     */
    public function create($user, array $data);

    /**
     * Update a given listing.
     *
     * @param  \App|Listing $listing
     * @param  array  $data
     * @return Listing
     */
    public function update($listing, array $data);
}
