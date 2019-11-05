<?php

namespace App\Http\Controllers\Listing;

use App\Addon;
use App\Amenity;
use App\Contracts\Interactions\Listing\CreateListing;
use App\Contracts\Interactions\Listing\CreateHit;
use App\Image;
use App\Listing;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Laravel\Spark\Spark;

class ListingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//       $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $listing = $this->interaction($request, CreateListing::class, [
            $request->user(), $request->all()
        ]);

       return response()->json(compact('listing'), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Listing $listing
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Listing $listing)
    {
        $listing = $listing
            ->with([
                'amenities',
                'category.metric',
                'coupon',
                'district',
                'hits',
                'images',
                'plan.type',
                'region',
                'section',
                'suburb',
                'tags',
                'user'])
            ->where('id', $listing->id)
            ->first();

        $hits =  Spark::interact( CreateHit::class,
            [$listing, ['session_id' =>$request->getSession()->getId()]]
        );

        $similar = Listing::similar($listing)->limit(4)->get();

        return view('spark::listings.show', compact(['listing', 'hits', 'similar']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param  \App\Listing $listing
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Listing $listing)
    {
        abort_unless($request->user()->ownsListing($listing), 403);

        $listing = $listing
            ->with([
                'addons',
                'amenities',
                'category.metric',
                'coupon',
                'district',
                'plan.type',
                'region',
                'section',
                'suburb',
                'tags'])
            ->where('id', $listing->id)
            ->first();

        $addons = Addon::all()
            ->flatten();

        $amenities = Amenity::findByCategory($listing->category->id)
            ->get()
            ->flatten();

        $images = Image::findByListing($listing->id)
            ->get()
            ->flatten();

        $tags = Tag::findByCategory($listing->category->id)
            ->get()
            ->flatten();

        return view('spark::listings.wizard', compact(['listing', 'addons', 'amenities', 'images', 'tags']));
    }
}
