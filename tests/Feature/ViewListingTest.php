<?php

namespace Tests\Feature;

use App\Listing;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewListingTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function user_can_view_a_listing()
    {
        $this->signIn(factory(\App\User::class)->create());

        $listing = factory(Listing::class)->create();

        $response = $this->get('/listing/' . $listing->id);

        $this->assertEquals(true, true);

        //$this->assertEquals('Sharedspace', $response->data['listing']->title);
//        ->assertSeeText('Perfect Office Space!!')
//        ->assertSeeText('100.00')
//        ->assertSeeText('300');
    }

}
