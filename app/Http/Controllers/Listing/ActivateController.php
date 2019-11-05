<?php

namespace App\Http\Controllers\Listing;

use App\Billing\PaymentFailedException;
use App\Listing;
use App\Billing\PaymentGateway;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivateController extends Controller
{
    private $paymentGateway;

    public function __construct(PaymentGateway $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Listing $listing)
    {
        try {
            $this->paymentGateway->charge($request->get('amount'),  $request->get('payment_token'));

            $listing->transactions()->create([
                'user_id' => $listing->user_id,
                'type_id' => $listing->plan_id,
            ]);

            $listing->update(['status' => 'enabled']);

            return response()->json([], 201);

        } catch(PaymentFailedException $e) {
            return response()->json([], 422);
        }
    }
}
