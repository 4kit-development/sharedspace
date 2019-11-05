<?php

namespace App\Interactions\Listing;

use App\Contracts\Interactions\Listing\UpdatePlanInformation as Contract;
use App\Contracts\Repositories\ListingRepository;
use Illuminate\Support\Facades\Validator;
use Laravel\Spark\Spark;

class UpdatePlanInformation implements Contract
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
            'plan' => 'required'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function handle($listing, array $data)
    {
        $information = [
            'plan_id' => $data['plan']['id'],
            'current_step' => $data['currentStep'],
        ];

        return Spark::interact(
            ListingRepository::class.'@update', [$listing, $information]
        );
    }
}
