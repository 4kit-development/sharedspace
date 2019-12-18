<?php

namespace App\Http\Controllers\Listing;

use App\Contracts\Interactions\Listing\CreateListing;
use App\Contracts\Interactions\Listing\UpdateGeneralInformation;
use App\Listing;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;

class GeneralInformationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listing $listing)
    {
        $listing = $this->interaction($request, UpdateGeneralInformation::class, [
            $listing, $request->all()
        ]);

        return response()->json(compact('listing'), 200);
    }
}
