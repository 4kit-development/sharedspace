<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Get all types for the plans
     */
    public function metric()
    {
        return $this->belongsTo('App\Metric');
    }
}
