<?php

namespace App\Contracts\Interactions\Listing;

interface RedeemCoupon
{
    /**
     * Redeem a coupon for the given billable entity.
     *
     * @param  \App\Coupon  $coupon
     * @param  array  $listing
     * @return void
     */
    public function handle($coupon, $listing);
}
