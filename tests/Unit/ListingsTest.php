<?php

namespace Tests\Unit;

use App\Listing;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListingsTest extends TestCase
{

  use DatabaseMigrations;

    /** @test */
    public function listing_with_an_active_status_is_published()
    {
    	$listingA = factory(Listing::class)->create([
    		'status' => 'enabled'
    	]);
    	$listingB = factory(Listing::class)->create([
    		'status' => 'enabled'
    	]);
    	$listingC = factory(Listing::class)->create([
    		'status' => 'expired'
    	]);

    	$activeListings = Listing::enabled()->get();

    	$this->assertTrue($activeListings->contains($listingA));
    	$this->assertTrue($activeListings->contains($listingB));
    	$this->assertFalse($activeListings->contains($listingC));


    }
}
