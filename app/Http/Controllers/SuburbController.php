<?php

namespace App\Http\Controllers;

use App\Suburb;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SuburbController extends Controller
{
    /**
     * Display all suburbs of the resource.
     *
     * @return Collection
     */
    public function index()
    {
        return Suburb::all();
    }

    /**
     * Display specific suburbs by region id of the resource.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function findByDistrict(Request $request, $id)
    {
        return Suburb::where('district_id', $id)->get()->toArray();
    }

}
