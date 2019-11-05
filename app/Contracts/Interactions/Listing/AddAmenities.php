<?php

namespace App\Contracts\Interactions\Listing;

interface AddAmenities
{
    /**
     * Add amenities to the given listing.
     *
     * @param  \App\Listing  $listing
     * @param  \App\Amenity  $amenities
     * @return \App\Listing
     */
    public function handle($listing, $amenities);
}
