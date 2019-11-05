<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Listing;
use App\Contracts\Interactions\Listing\RemoveImage;
use App\Contracts\Interactions\Listing\StoreImages;
use App\Contracts\Interactions\Listing\UpdateImages;
use Illuminate\Http\Request;
use Laravel\Spark\Spark;

class ImageController extends Controller
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
     * Remove the order of image.
     *
     * @param  Request  $request
     * @param  \App\Listing  $listing
     * @return Boolean
     */
    public function remove(Request $request, Listing $listing)
    {
        return Spark::interact( RemoveImage::class,
            [$request->all()]
        );
    }

    /**
     * Store the listing image.
     *
     * @param  Request  $request
     * @param  \App\Listing  $listing
     * @return Response
     */
    public function store(Request $request, Listing $listing)
    {
        return $this->interaction(
            $request, StoreImages::class,
            [$listing, $request->all()]
        );
    }

    /**
     * Update the order of image.
     *
     * @param  Request  $request
     * @param  \App\Listing  $listing
     * @return Boolean
     */
    public function update(Request $request, Listing $listing)
    {
        return Spark::interact( UpdateImages::class,
            [$listing, $request->all()]
        );
    }
}
