<?php

namespace App\Http\Controllers\Listing;

use App\Contracts\Interactions\Listing\UpdatePlanInformation;
use App\Listing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlanInformationController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listing $listing)
    {
        //
        $listing = $this->interaction($request, UpdatePlanInformation::class, [
            $listing, $request->all()
        ]);

        return response()->json(compact('listing'), 200);
    }
}
