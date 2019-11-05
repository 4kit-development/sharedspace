<?php

namespace Tests\Feature;

use App\Listing;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateListingTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function user_redirects_if_not_logged_in_when_trying_to_create_a_listing()
    {
        $this->signIn(factory(\App\User::class)->create());

        $attributes = [
            'section_id' => 1,
            'category_id' => 1,
            'region_id' => 1,
            'district_id' => 1,
            'suburb_id' => 1,
            'geocode_lng' => 173,
            'geocode_lat' => 35,
            'address' => '101 Austin Road, Maunu',
            'status' => 'disabled'
        ];

        $response = $this->post('listing/store', $attributes);

        $response->assertStatus(302);
    }

}
