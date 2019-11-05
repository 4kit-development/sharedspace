<?php

namespace App\Interactions\Listing;

use Laravel\Spark\Spark;
use App\Contracts\Interactions\Listing\RedeemCoupon as RedeemCouponContract;
use App\Contracts\Repositories\ListingRepository;

class RedeemCoupon implements RedeemCouponContract
{
    /**
     * {@inheritdoc}
     */
    public function handle($listing, $data)
    {
        $information =  [
            'coupon_id' => $data['id'] ?? null
        ];

        $coupon = Spark::interact(
            ListingRepository::class.'@update', [$listing, $information]
        );

        if ($coupon) {
            return $data;
        }
    }
}
