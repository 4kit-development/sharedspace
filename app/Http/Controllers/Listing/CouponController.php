<?php

namespace App\Http\Controllers\Listing;

use Illuminate\Http\Request;
use App\Listing;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\Listing\CouponRepository;

class CouponController extends Controller
{
    /**
     * The coupon repository implementation.
     *
     * @var \App\Contracts\Repositories\Listing\CouponRepository
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

        $this->middleware('auth', ['only' => 'current']);
    }

    /**
     * Get the specified coupon from Stripe.
     *
     * This is used during registration to show the discount.
     *
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $coupon = $this->coupons->find($code);

        return $coupon ? response()->json($coupon->toArray()) : abort(404);
    }

    /**
     * Get the current discount for the given listing.
     *
     * @param  Request  $request
     * @param  string  $listingId
     * @return \Illuminate\Http\Response
     */
    public function current(Request $request, $listingId)
    {
        $listing = Listing::where('id', $listingId)->latest();

        if (!empty($listing)) {
            return response()->json($listing->coupon->toArray());
        }

        abort(204);
    }
}
