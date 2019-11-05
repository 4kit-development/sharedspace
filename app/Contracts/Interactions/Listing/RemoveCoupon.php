<?php

namespace App\Contracts\Interactions\Listing;

interface RemoveCoupon
{
    /**
     * Redeem a coupon for the given billable entity.
     *
     * @param  array  $listing
     * @return void
     */
    public function handle($listing);
}
