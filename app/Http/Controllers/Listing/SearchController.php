<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('spark::listings.search');
    }
}

