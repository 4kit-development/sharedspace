<?php

namespace App\Interactions\Listing;

use App\Contracts\Interactions\Listing\AddAmenities as Contract;

class AddAmenities implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function handle($listing, $amenities)
    {
        return $listing->amenities()->sync($amenities);
    }
}

