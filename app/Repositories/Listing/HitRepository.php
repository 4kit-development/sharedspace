<?php

namespace App\Repositories\Listing;

use App\Hit;
use App\Contracts\Repositories\Listing\HitRepository as Contract;

class HitRepository implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function create($listing, array $data)
    {
         return Hit::create($data);
    }
}
