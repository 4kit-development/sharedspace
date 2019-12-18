<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Laravel\Scout\Searchable;

/**
 * @method static enabled()
 * @method static expired()
 * @method static userListings($user)
 * @method static similar($listing)
 */
class Listing extends Model
{
    use Searchable;

    protected $guarded = [];

    protected $table = 'listings';

    protected $appends = ['days_remaining', 'formatted_area', 'formatted_capacity', 'formatted_cost', 'formatted_expired_at', 'formatted_listed_at', 'formatted_tags', 'page_views', 'progress'];

    /**
     * Get all of the addons that belong to the listing.
     */
    public function addons()
    {
        return $this->belongsToMany(
            'App\Addon', 'listing_addons', 'listing_id', 'addon_id'
        );
    }

    /**
     * Get all of the amenities that belong to the listing.
     */
    public function amenities()
    {
        return $this->belongsToMany(
            'App\Amenity', 'listing_amenities', 'listing_id', 'amenity_id'
        )->select(['id', 'title', 'icon']);
    }

    /**
     * Get the section of the listing.
     */
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    /**
     * Get all of the coupons that belong to the listing.
     */
    public function coupon()
    {
        return $this->belongsTo('App\Coupon');
    }

    /**
     * Get the district of the listing.
     */
    public function district()
    {
        return $this->belongsTo('App\District');
    }

    /**
     * Get the page views of the listing.
     */
    public function hits()
    {
        return $this->hasMany('App\Hit');
    }

    /**
     * Get the images of the listing.
     */
    public function images()
    {
        return $this->hasMany('App\Image');
    }

    /**
     * Get the region of the listing.
     */
    public function plan()
    {
        return $this->belongsTo('App\Plan');
    }

    /**
     * Get the region of the listing.
     */
    public function region()
    {
        return $this->belongsTo('App\Region');
    }

    /**
     * Get the section of the listing.
     */
    public function section()
    {
    	return $this->belongsTo('App\Section');
    }

    /**
     * Get the suburb of the listing.
     */
    public function suburb()
    {
        return $this->belongsTo('App\Suburb');
    }

    /**
     * Get all of the addons that belong to the listing.
     */
    public function tags()
    {
        return $this->belongsToMany(
            'App\Tag', 'listing_tags', 'listing_id', 'tag_id'
        )->select(['id', 'title']);
    }

    /**
     * Get all the transactions for the listing.
     */
    public function transactions()
    {
    	return $this->hasMany('App\Transaction');
    }

    /**
     * Get the type of the listing.
     */
    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    /**
     * Get the user of the listing.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * return listings which are enabled
     */
    public function scopeEnabled($query) {
    	return $query->where('status', 'enabled');
    }

    /**
     * return listings which are expired
     */
    public function scopeExpired($query) {
        return $query->where('status', 'expired');
    }

    /**
     * return similar listings which are enabled
     */
    public function scopeSimilar($query, $listing) {
        return $query
            ->with([
                'category.metric',
                'images'])
            ->where('category_id', $listing->category_id)
            ->where('district_id', $listing->district_id)
            ->where('id', '<>', $listing->id)
            ->where('status', 'enabled');
    }

    /**
     * return listings for specific user
     */
    public function scopeUserListings($query, $user) {
        return $query->where('user_id', $user->id);
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $results = $this->with(['amenities:title', 'category:id,metric_id,title,name', 'category.metric', 'district:id,title', 'images:id,listing_id,url', 'plan.type', 'region:id,title', 'section:id,title', 'suburb:id,title', 'user:id,name'])
            ->where([['id', $this->id], ['status', 'enabled']])
            ->first();

        $results['_geoloc'] = [
            'lat' => $this->geocode_lat,
            'lng' => $this->geocode_lng
        ];

        $results['primary_image'] = $results->images->isEmpty() ? config('url').'/img/no-image.jpg' : $results->images->first()->url;

        unset($results['full_description']);
        unset($results['category']['icon']);
        unset($results['amenities']['icon']);
        unset($results['coupon_id']);
        unset($results['images']);
        unset($results['video']);
        unset($results['expiry_notification']);
        unset($results['current_step']);

        return collect($results)->toArray();
    }

    /**
     * Get the page views
     */
    public function getPageViewsAttribute()
    {
        return $this->hits()->groupBy('session_id')->count();
    }

    /**
     * Get the correct number format for price
     */
    protected function getFormattedAreaAttribute()
    {
        if ($this->min_cost) {
            return '$' . $this->min_area . ' - ' . $this->max_area . ' ' . $this->category->metric->area_specification;
        }
        return $this->max_area . ' ' . $this->category->metric->area_specification;
    }

    /**
     * Get the correct number format for capacity
     */
    protected function getFormattedCapacityAttribute()
    {
        if ($this->min_capacity) {
            return $this->min_capacity . ' - ' . $this->max_capacity;
        }
        return $this->max_capacity;
    }

    /**
     * Get the correct number format for price
     */
    protected function getFormattedCostAttribute()
    {
        if($this->price_negotiable) {
            return 'Price Negotiable';
        }

        if ($this->min_cost) {
            return '$' . $this->min_cost . ' - ' . $this->max_cost;
        }
    	return '$' . $this->max_cost;
    }

    /**
     * Get and format end date
     */
    protected function getFormattedExpiredAtAttribute()
    {
        return Carbon::parse($this->expired_at)->format('d M Y');
    }

    /**
     * Get and format start date
     */
    protected function getFormattedListedAtAttribute()
    {
        return Carbon::parse($this->listed_at)->format('d M Y');
    }

    /**
     * Get remaining percentage of the days left till listing expires
     */
    protected function getFormattedTagsAttribute()
    {
        return $this->tags()->pluck('title')->implode(' / ');
    }

    /**
     * Get remaining percentage of the days left till listing expires
     */
    protected function getProgressAttribute()
    {
        $startdate = Carbon::parse($this->listed_at);
        $enddate = Carbon::parse($this->expired_at);
        $now = Carbon::now();

        if($now >= $enddate) {
            return 100;
        }

        return number_format(($startdate->diffInDays($now) / $startdate->diffInDays($enddate)) * 100, 0);
    }

    /**
     * Get remaining percentage of the days left till listing expires
     */
    protected function getDaysRemainingAttribute()
    {
        $enddate = Carbon::parse($this->expired_at);
        $now = Carbon::now();

        if($now >= $enddate) {
            return 0;
        }

        return $now->diffInDays($enddate) . ' days remaining';
    }

    public function calculateTransactionalTotals() 
    {
    	//Should calculate all additional charges such as facebook posting etc
    	return 2500;
    }

}
