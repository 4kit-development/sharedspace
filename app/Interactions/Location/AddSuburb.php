<?php

namespace App\Interactions\Location;

use App\Contracts\Repositories\SuburbRepository;
use App\Contracts\Interactions\Location\AddSuburb as Contract;
use Laravel\Spark\Spark;
use Illuminate\Support\Facades\Validator;

class AddSuburb implements Contract
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
    public function handle($district, $name)
    {
        $suburb = Spark::interact(
            SuburbRepository::class.'@create', [$district, $name]
        );

        return $suburb;
    }
}
