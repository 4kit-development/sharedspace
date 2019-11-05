<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

/**
 * @method static findByListing($listing_id)
 */

class Image extends Model implements Sortable
{
    use SortableTrait;

    protected $guarded = [];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

    /**
     * return all the images for a listing
     */
    public function scopefindByListing($query, $listing) {
        return $query->where('listing_id', $listing)->orderBy('order');
    }
}
