<?php

namespace App\Interactions\Listing;

use App\Contracts\Repositories\ListingRepository;
use Laravel\Spark\Spark;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Interactions\Listing\CreateListing as Contract;
use App\Contracts\Interactions\Location\AddRegion as AddRegionContract;
use App\Contracts\Interactions\Location\AddDistrict as AddDistrictContract;
use App\Contracts\Interactions\Location\AddSuburb as AddSuburbContract;

class CreateListing implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function validator($user, array $data)
    {
        return Validator::make($data, Spark::call(static::class.'@rules'));
    }

    /**
     * Get the basic validation rules for creating a new team.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category' => 'required',
            'address' => 'required'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function handle($user, array $data)
    {
        $region = Spark::interact(AddRegionContract::class, [$data['region']]);
        $district = Spark::interact(AddDistrictContract::class, [$region, $data['district']]);
        $suburb = Spark::interact(AddSuburbContract::class, [$district, $data['suburb']]);

        $data['region_id'] = $region->id;
        $data['district_id'] = $district->id;
        $data['suburb_id'] = $suburb->id;

        $listing = Spark::interact(
            ListingRepository::class.'@create', [$user, $data]
        );

        return $listing;
    }
}
