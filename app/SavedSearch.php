<?php

namespace App\Console\Commands;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static enabled()
 */

class SavedSearch extends Model
{

    /**
     * return listings which are enabled
     */
    public function scopeEnabled($query) {
        return $query->where('enabled', 1);
    }
}
