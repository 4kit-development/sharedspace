<?php

namespace App\Interactions\Listing;

use App\Contracts\Repositories\Listing\HitRepository;
use App\Contracts\Interactions\Listing\CreateHit as Contract;
use Laravel\Spark\Spark;

class CreateHit implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function handle($listing, array $data)
    {
        $data['listing_id'] = $listing->id;

        return Spark::interact(
            HitRepository::class.'@create', [$listing, $data]
        );
    }
}
