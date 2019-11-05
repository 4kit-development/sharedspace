<?php

namespace App\Interactions\Listing;

use App\Contracts\Repositories\ListingRepository;
use Laravel\Spark\Spark;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Interactions\Listing\UpdateGeneralInformation as Contract;
use App\Contracts\Interactions\Listing\AddTags as AddListingTagContract;
use App\Contracts\Interactions\Location\AddRegion as AddRegionContract;
use App\Contracts\Interactions\Location\AddDistrict as AddDistrictContract;
use App\Contracts\Interactions\Location\AddSuburb as AddSuburbContract;

class UpdateGeneralInformation implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function validator($listing, array $data)
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
            'address' => 'required',
            'contact' => 'required',
            'fullDescription' => 'required',
            'shortDescription' => 'required',
            'tags' => 'required',
            'title' => 'required'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function handle($listing, array $data)
    {
        $region = Spark::interact(AddRegionContract::class, [$data['region']]);
        $district = Spark::interact(AddDistrictContract::class, [$region, $data['district']]);
        $suburb = Spark::interact(AddSuburbContract::class, [$district, $data['suburb']]);

        $information = [
            'address' => $data['address'],
            'contact' => $data['contact'],
            'current_step' => $data['currentStep'],
            'district_id' => $district->id,
            'full_description' => $data['fullDescription'],
            'region_id' => $region->id,
            'short_description' => $data['shortDescription'],
            'suburb_id' => $suburb->id,
            'title'=> $data['title']
        ];

        $tags = Spark::interact(AddListingTagContract::class, [
            $listing, $data['tags']
        ]);

        return Spark::interact(
            ListingRepository::class.'@update', [$listing, $information]
        );
    }
}
