<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static findByCategory($category_id)
 */

class Plan extends Model
{
    protected $casts = [
        'price' => 'float',
    ];

    protected $appends = ['formatted_price'];

    /**
     * Get all types for the plans
     */
    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    /**
     * return plans for specified category
     */
    public function scopefindByCategory($query, $category) {
        return $query->where('category_id', $category);
    }

    public function getFormattedPriceAttribute() {
        return number_format($this->price / 100, 2);
    }
}
