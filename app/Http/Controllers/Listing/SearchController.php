<?php

namespace App\Http\Controllers\Listing;

use App\Amenity;
use App\Contracts\Interactions\Listing\CreateListing;
use App\Image;
use App\Listing;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Listing $listing
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        return view('spark::listings.search');
    }
}

