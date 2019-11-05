<?php

namespace Tests\Feature;

use App\Billing\FakePaymentGateway;
use App\Billing\PaymentGateway;
use App\Listing;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActivateListingTest extends TestCase
{
	use DatabaseMigrations;


    /** @test */
	public function customer_can_purchase_a_listing()
	{
        $this->signIn(factory(\App\User::class)->create());

		$paymentGateway = new FakePaymentGateway();
		$this->app->instance(PaymentGateway::class, $paymentGateway);

		$listing = factory(Listing::class)->create([
		    'max_cost' => 3250,
            'status' => 'disabled'
        ]);

		$response = $this->json('POST', "listing/{$listing->id}/activate", [
		    'amount' => 20000,
			'email' => 'jackson@jsnightingale.com',
			'quantity' => 1,
			'payment_token' => $paymentGateway->getValidTestToken()
		]);

		$updatedListing = Listing::first();

		$response->assertStatus(201);

		$this->assertEquals(2500, $paymentGateway->totalCharges());

		$this->assertTrue($listing->transactions->contains(function ($transaction) use ($listing) {
			return $transaction->user_id == $listing->user_id;
		}));

		$this->assertEquals('enabled', $updatedListing->status);
	}

	/** @test */
	public function a_listing_is_not_published_if_payment_fails()
    {
        $this->signIn(factory(\App\User::class)->create());

        $listing = factory(Listing::class)->create([
            'max_cost' => 3250,
            'status' => 'disabled'
        ]);

        $paymentGateway = new FakePaymentGateway();
        $this->app->instance(PaymentGateway::class, $paymentGateway);

        $response = $this->json('POST', "listing/{$listing->id}/activate", [
            'email' => 'jackson@jsnightingale.com',
            'quantity' => 1,
            'payment_token' => 'invalid-payment-token'
        ]);

        $updatedListing = Listing::first();

        $response->assertStatus(422);

        $this->assertEquals('disabled', $listing->status);
    }
}
