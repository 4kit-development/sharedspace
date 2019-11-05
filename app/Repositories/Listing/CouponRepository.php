<?php

namespace App\Repositories\Listing;

use Exception;
use App\Coupon;
use App\Contracts\Repositories\Listing\CouponRepository as Contract;

class CouponRepository implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function valid($code)
    {
        return ! is_null($this->find($code));
    }

    /**
     * {@inheritdoc}
     */
    public function canBeRedeemed($code)
    {
        return $this->valid($code);
    }

    /**
     * {@inheritdoc}
     */
    public function find($code)
    {
        try {
            $coupon = Coupon::findByCode($code)->first();

            if ($coupon && $coupon->valid) {
                return $coupon;
            }
        } catch (Exception $e) {
            //
        }
    }
}
