<?php

namespace App\Http\Controllers;

use App\Category;
use App\Amenity;

class AmenitiesController extends Controller
{
    /**
     * Display a amenities for a specific category.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function find(Category $category)
    {
        $amenities = Amenity::findByCategory($category->id)
            ->get();

        return response()->json($amenities);
    }
}
