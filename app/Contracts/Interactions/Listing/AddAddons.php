<?php

namespace App\Contracts\Interactions\Listing;

interface AddAddons
{
    /**
     * Add amenities to the given listing.
     *
     * @param  \App\Listing  $listing
     * @param  \App\Addon  $addons
     * @return \App\Listing
     */
    public function handle($listing, $addons);
}
