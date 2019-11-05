<?php

namespace App\Interactions\Location;

use App\Contracts\Repositories\DistrictRepository;
use App\Contracts\Interactions\Location\AddDistrict as Contract;
use Laravel\Spark\Spark;
use Illuminate\Support\Facades\Validator;

class AddDistrict implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function validator(array $data)
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
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function handle($region, $name)
    {
        $district = Spark::interact(
            DistrictRepository::class.'@create', [$region, $name]
        );

        return $district;
    }
}
