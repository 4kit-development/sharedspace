<?php

namespace App\Http\Controllers;

use App\District;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display all districts of the resource.
     *
     * @return Collection
     */
    public function index()
    {
        return District::all();
    }

    /**
     * Display specific districts by region id of the resource.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function findByRegion(Request $request, $id)
    {
        return District::where('region_id', $id)->get()->toArray();
    }

}
