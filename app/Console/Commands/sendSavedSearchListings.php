<?php

namespace App\Console\Commands;

use App\Category;
use App\District;
use App\Jobs\savedSearches;
use App\Listing;
use App\Region;
use App\Suburb;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class sendSavedSearchListings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:savedSearchListings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails to those who saved a search and want to see new available listings.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $savedSearches = $this->getSavedSearches();
        $listings = $this->getListings($savedSearches);

        foreach($listings as $listing) {
            savedSearches::dispatch($listing)->onQueue('emails');
        }

        return true;
    }


    /**
     * @return Collection
     */
    protected function getSavedSearches()
    {
        return SavedSearch::enabled()->get();
    }

    /**
     * @param $savedSearches
     * @return \Illuminate\Support\Collection
     */
    public function getListings($savedSearches)
    {
        $listings = collect();

        foreach($savedSearches as $search) {
            if (Carbon::parse('2018-12-13 07:57:15')->startOfDay()->eq(Carbon::parse($search->last_sent_at)->addDays($search->frequency))) {
                $listings->push(collect(Listing::search('')
                    ->when(!empty($search->section_id), function ($query) use ($search) {
                        return $query->where('section_id', '=', $search->section_id);
                    })
                    ->when(!empty($search->category_id), function ($query) use ($search) {
                        return $query->where('category_id', '=', $search->category_id);
                    })
                    ->when(!empty($search->region_id), function ($query) use ($search) {
                        return $query->where('region_id', '=', $search->region_id);
                    })
                    ->when(!empty($search->district_id), function ($query) use ($search) {
                        return $query->where('district_id', '=', $search->district_id);
                    })
                    ->when(!empty($search->suburb_id), function ($query) use ($search) {
                        return $query->where('suburb_id', '=', $search->suburb_id);
                    })
                    ->when(!empty($search->district_id), function ($query) use ($search) {
                        return $query->where('district_id', '=', $search->district_id);
                    })
                    //->where('listed_at', '>=', $search->last_sent_at)
                    ->raw()['hits'])->take(3));
            }

            $search->last_sent_at = Carbon::today();
            $search->update();
        }

        return $listings;
    }
}
