<?php

namespace App\Interactions\Location;

use App\Contracts\Repositories\RegionRepository;
use App\Contracts\Interactions\Location\AddRegion as Contract;
use Laravel\Spark\Spark;
use Illuminate\Support\Facades\Validator;

class AddRegion implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function validator($name)
    {
        return Validator::make($name, Spark::call(static::class.'@rules'));
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
    public function handle($name)
    {
        $region = Spark::interact(
            RegionRepository::class.'@create', [$name]
        );

        return $region;
    }
}
