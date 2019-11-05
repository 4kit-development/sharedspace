<?php

namespace App\Interactions\Listing;

use App\Contracts\Interactions\Listing\UpdateAddonInformation as Contract;
use App\Contracts\Interactions\Listing\AddAddons as AddListingAddonsContract;
use Illuminate\Support\Facades\Validator;
use Laravel\Spark\Spark;

class UpdateAddonInformation implements Contract
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
        return [''];
    }

    /**
     * {@inheritdoc}
     */
    public function handle($listing, array $data)
    {
        $addons = $data['addons'];

        return Spark::interact(AddListingAddonsContract::class, [$listing, $addons]
        );
    }
}
