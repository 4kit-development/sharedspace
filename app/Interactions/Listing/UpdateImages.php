<?php

namespace App\Interactions\Listing;

use App\Contracts\Repositories\Listing\ImageRepository;
use App\Contracts\Interactions\Listing\UpdateImages as Contract;
use Laravel\Spark\Spark;

class UpdateImages implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function handle($listing, array $data)
    {
        return Spark::interact(
            ImageRepository::class.'@update', [$listing, $data]
        );
    }
}
