<?php

namespace App\Http\Controllers\Listing;

use App\Contracts\Interactions\Listing\RemoveCoupon;
use Laravel\Spark\Spark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Listing;
use App\Contracts\Repositories\Listing\CouponRepository;
use App\Contracts\Interactions\Listing\RedeemCoupon;

class RedeemCouponController extends Controller
{
    /**
     * The listing coupon repository implementation.
     *
     * @var \App\Contracts\Repositories\Listing\CouponRepository $coupons
     */
    protected $coupons;

    /**
     * Create a new controller instance.
     *
     * @param  \App\Contracts\Repositories\Listing\CouponRepository  $coupons
     * @return void
     */
    public function __construct(CouponRepository $coupons)
    {
        $this->coupons = $coupons;

        $this->middleware('auth');
    }

    /**
     * Redeem the given coupon code.
     *
     * @param  Request  $request
     * @param  \App\Listing $listing
     * @return \Illuminate\Http\Response
     */
    public function redeem(Request $request, Listing $listing)
    {
        $this->validate($request, [
            'coupon' => 'required',
        ]);

        // We will verify that the coupon can actually be redeemed. In some cases even
        // valid coupons can not get redeemed by an existing user if this coupon is
        // running as a promotion for brand new registrations to the application.
        if (! $this->coupons->canBeRedeemed($request->coupon)) {
            return response()->json([
                'errors' => [
                    'coupon' => [
                        __('This coupon code is invalid.')
                    ]
                ]
            ], 422);
        }

       return Spark::interact(RedeemCoupon::class, [
            $listing, $this->coupons->find($request->coupon)
        ]);
    }

    /**
     * Remove the given coupon code.
     *
     * @param  Request  $request
     * @param  \App\Listing $listing
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request, Listing $listing)
    {
        return Spark::interact(RemoveCoupon::class, [
            $listing
        ]);
    }
}
