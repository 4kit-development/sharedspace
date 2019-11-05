<?php

namespace App\Http\Controllers;

use App\Addon;

class AddOnController extends Controller
{
    /**
     * Display all addons.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addons = Addon::all();

        $addons->transform(function ($addon) {
            return collect($addon)->merge(['selected' => 0]);
        });

        return response()->json($addons);
    }
}
