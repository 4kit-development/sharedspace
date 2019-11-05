<?php

namespace Tests\Feature;

use App\Category;
use App\Plan;
use App\Type;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlanListingTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function plan_is_sent_as_json_with_correct_category()
    {
        $this->signIn(factory(\App\User::class)->create());

        //Office Space
        $category = factory(Category::class)->create();
        factory(Plan::class)->create();
        factory(Type::class)->create();

        $request = $this->json("GET", "/api/listing/plan/{$category->id}");

        $request->assertStatus(200);
        $this->assertEquals('Basic', collect(json_decode($request->getContent()))->first()->title);
    }

}
