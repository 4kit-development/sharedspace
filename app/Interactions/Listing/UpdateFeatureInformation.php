<?php

namespace App\Interactions\Listing;

use App\Contracts\Interactions\Listing\UpdateFeatureInformation as Contract;
use App\Contracts\Interactions\Listing\AddAmenities as AddListingAmenitiesContract;
use App\Contracts\Repositories\ListingRepository;
use Illuminate\Support\Facades\Validator;
use Laravel\Spark\Spark;

class UpdateFeatureInformation implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function validator($listing, array $data)
    {
        return Validator::make($data, Spark::call(static::class.'@rules'), $this->messages());
    }

    /**
     * Get the basic validation rules for creating a new team.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'amenities' => 'required',
//            'maxArea' => 'required|gte:minArea',
            'maxCapacity' => 'required|gte:minCapacity',
//            'maxCost' => 'required|gte:minCost',
            ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'maxArea.gte:minArea' => 'A title is required',
            'maxCapacity.gte:minCapacity'  => 'A message is required',
            'maxCost.gte:minCost'  => 'A message is required',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function handle($listing, array $data)
    {
        $information = [
            'min_area' => $data['minArea'] ?? null,
            'max_area' => $data['maxArea'],
            'min_capacity' => $data['minCapacity'] ?? null,
            'max_capacity' => $data['maxCapacity'],
            'min_cost' => $data['minCost'] ?? null,
            'max_cost' => $data['maxCost'],
            'outgoings' => $data['outgoings'],
            'current_step' => $data['currentStep'],
        ];

        $amenities = Spark::interact(AddListingAmenitiesContract::class, [
            $listing, $data['amenities']
        ]);

        if ($amenities) {
           return Spark::interact(
                ListingRepository::class.'@update', [$listing, $information]
            ); 
        }
    }
}
