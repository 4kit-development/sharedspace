<?php

namespace App\Contracts\Repositories\Listing;

interface CouponRepository
{
    /**
     * Determine if the given coupon code is valid.
     *
     * @param  string  $code
     * @return bool
     */
    public function valid($code);

    /**
     * Determine if the coupon may be redeemed by an existing listing.
     *
     * @param  string  $code
     * @return bool
     */
    public function canBeRedeemed($code);

    /**
     * Get the coupon data for the given code.
     *
     * @param  string  $code
     * @return mixed
     */
    public function find($code);
}
