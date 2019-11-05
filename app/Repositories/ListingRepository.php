<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Listing;
use App\Contracts\Repositories\ListingRepository as ListingRepositoryContract;

class ListingRepository implements ListingRepositoryContract
{
    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Listing::get()->with('owner', 'users')->where('id', $id)->first();
    }

    /**
     * {@inheritdoc}
     */
    public function forUser($user)
    {
        return $user->listing()->with('owner')->get();
    }

    /**
     * {@inheritdoc}
     */
    public function create($user, array $data)
    {
        $attributes = [
            'user_id' => $user->id,
            'section_id' => 1,
            'category_id' => $data['category'],
            'region_id' => $data['region_id'],
            'district_id' => $data['district_id'],
            'suburb_id' => $data['suburb_id'],
            'address' => $data['address'],
            'geocode_lng' => $data['longitude'],
            'geocode_lat' => $data['latitude'],
            'status' => 'disabled',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        return Listing::create($attributes);
    }

    /**
     * {@inheritdoc}
     */
    public function update($listing, array $data)
    {
        return Listing::find($listing->id)->update($data);
    }
}
