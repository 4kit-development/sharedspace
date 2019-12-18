<?php

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display all regions of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Region::all();
    }

}
