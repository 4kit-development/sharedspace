<?php

namespace App\Interactions\Listing;

use Illuminate\Support\Facades\Storage;
use Laravel\Spark\Spark;
use App\Contracts\Interactions\Listing\RemoveImage as Contract;
use App\Contracts\Repositories\Listing\ImageRepository;

class RemoveImage implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function handle($data)
    {

        if (Storage::disk('s3')->exists($data['path'])) {
            Storage::disk('s3')->delete($data['path']);
        }

        Spark::interact(
            ImageRepository::class.'@remove', [$data['id']]
        );
    }
}
