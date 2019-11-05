<?php

namespace App\Contracts\Repositories\Listing;

interface HitRepository
{
    /**
     * Create new hit for the given listing.
     *
     * @param  \App\Listing  $listing
     * @return \App\Image;
     */
    public function create($listing, array $data);
}
