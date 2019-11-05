<?php

namespace App\Events\Listings;

class ListingCreated
{

    /**
     * The listing instance.
     *
     * @var \App\Listing
     */
    public $listing;

    /**
     * Create a new event instance.
     *
     * @param  App\Listing $listing
     * @return void
     */
    public function __construct($listing)
    {
        $this->listing = $listing;
    }
}
