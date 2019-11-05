<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    /**
    * Get all types for the plans
    */
    public function plans()
    {
        return $this->hasMany('App\Plan');
    }
}
