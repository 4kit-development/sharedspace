<?php

namespace Tests\Unit;

use App\Billing\PaymentFailedException;
use App\Billing\StripePaymentGateway;
use Laravel\Spark\Services\Stripe;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StripePaymentGatewayTest extends TestCase
{

    use DatabaseMigrations;

    private $lastCharge;

    protected function setUp()
    {
        parent::setUp();
        $this->lastCharge = $this->lastCharge();
    }

    private function lastCharge() {
        return \Stripe\Charge::all(
            ['limit' => 1],
            ['api_key' => config('services.stripe.secret')]
        )['data'][0];
    }

    private function newCharges() {
        return \Stripe\Charge::all(
            [
                'limit' => 1,
                'ending_before' => $this->lastCharge->id
            ],
            ['api_key' => config('services.stripe.secret')]
        )['data'];
    }

    private function validToken() {
        return \Stripe\Token::create([
            'card' => [
                'number' => '4242424242424242',
                'exp_month' => 1,
                'exp_year' => date('y') + 1,
                'cvc' => '123'
            ]
        ], ['api_key' => config('services.stripe.secret')]);
    }

    /** @test */
    public function charges_with_a_vaild_payment_token_are_successful()
    {
        $paymentGateway = new StripePaymentGateway(config('services.stripe.secret'));

        $paymentGateway->charge(2500, $this->validToken());

        $this->assertCount(1, $this->newCharges());
        $this->assertEquals(2500, $this->lastCharge()->amount);

    }

    /** @test */
    public function charges_with_a_invalid_payment_token_fail()
    {
        try {
            $paymentGateway = new StripePaymentGateway(config('services.stripe.secret'));

            $paymentGateway->charge(2500, 'invalid-payment-token');
        } catch(PaymentFailedException $e) {
            $this->assertCount(0, $this->newCharges());
            return;
        }

        $this->fail("Charging with an invalid payment token didn't throw an exception");
    }
}
