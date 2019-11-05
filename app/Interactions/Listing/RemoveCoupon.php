<?php

namespace App\Interactions\Listing;

use Laravel\Spark\Spark;
use App\Contracts\Interactions\Listing\RemoveCoupon as RemoveCouponContract;
use App\Contracts\Repositories\ListingRepository;

class RemoveCoupon implements RemoveCouponContract
{
    /**
     * {@inheritdoc}
     */
    public function handle($listing)
    {
        $information =  [
            'coupon_id' => null
        ];

        Spark::interact(
            ListingRepository::class.'@update', [$listing, $information]
        );
    }
}
