<?php

namespace App\Http\Controllers;

use App\Category;
use App\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application splash screen.
     *
     * @return Response
     */
    public function show()
    {
        $listings_count = DB::table('listings')
            ->select('category_id', 'icon', 'name', 'nickname', DB::raw('count(*) as total'))
            ->join('categories', 'categories.id', '=', 'listings.category_id')
            ->groupBy('category_id')
            ->get();

        $office = Listing::search('')->where('category_id', 1)->take(10)->get();
        $event = Listing::search('')->where('category_id', 14)->take(10)->get();
        $meeting = Listing::search('')->where('category_id', 17)->take(10)->get();

        return view('home', compact(['listings_count']));
    }
}
