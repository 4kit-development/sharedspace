<?php

namespace App\Providers;

use App\Billing\PaymentGateway;
use App\Billing\StripePaymentGateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $services = [
            'Contracts\Interactions\Listing\AddAddons' => 'Interactions\Listing\AddAddOns',
            'Contracts\Interactions\Listing\AddAmenities' => 'Interactions\Listing\AddAmenities',
            'Contracts\Interactions\Listing\AddTags' => 'Interactions\Listing\AddTags',
            'Contracts\Interactions\Listing\CreateHit' => 'Interactions\Listing\CreateHit',
            'Contracts\Interactions\Listing\CreateListing' => 'Interactions\Listing\CreateListing',
            'Contracts\Interactions\Listing\RedeemCoupon' => 'Interactions\Listing\RedeemCoupon',
            'Contracts\Interactions\Listing\RemoveCoupon' => 'Interactions\Listing\RemoveCoupon',
            'Contracts\Interactions\Listing\RemoveImage' => 'Interactions\Listing\RemoveImage',
            'Contracts\Interactions\Listing\StoreImages' => 'Interactions\Listing\StoreImages',
            'Contracts\Interactions\Listing\UpdateImages' => 'Interactions\Listing\UpdateImages',
            'Contracts\Interactions\Listing\UpdateGeneralInformation' => 'Interactions\Listing\UpdateGeneralInformation',
            'Contracts\Interactions\Listing\UpdateFeatureInformation' => 'Interactions\Listing\UpdateFeatureInformation',
            'Contracts\Interactions\Listing\UpdateMediaInformation' => 'Interactions\Listing\UpdateMediaInformation',
            'Contracts\Interactions\Listing\UpdatePlanInformation' => 'Interactions\Listing\UpdatePlanInformation',
            'Contracts\Interactions\Listing\UpdateAddonInformation' => 'Interactions\Listing\UpdateAddonInformation',
            'Contracts\Interactions\Location\AddDistrict' => 'Interactions\Location\AddDistrict',
            'Contracts\Interactions\Location\AddRegion' => 'Interactions\Location\AddRegion',
            'Contracts\Interactions\Location\AddSuburb' => 'Interactions\Location\AddSuburb',
            'Contracts\Repositories\DistrictRepository' => 'Repositories\DistrictRepository',
            'Contracts\Repositories\Listing\CouponRepository' => 'Repositories\Listing\CouponRepository',
            'Contracts\Repositories\Listing\ImageRepository' => 'Repositories\Listing\ImageRepository',
            'Contracts\Repositories\Listing\HitRepository' => 'Repositories\Listing\HitRepository',
            'Contracts\Repositories\ListingRepository' => 'Repositories\ListingRepository',
            'Contracts\Repositories\RegionRepository' => 'Repositories\RegionRepository',
            'Contracts\Repositories\SuburbRepository' => 'Repositories\SuburbRepository',
        ];

        foreach ($services as $key => $value) {
            $this->app->singleton('App\\'.$key, 'App\\'.$value);
        }

        $this->app->bind(StripePaymentGateway::class, function() {
           return new StripePaymentGateway(config('services.stripe.secret'));
        });

        $this->app->bind(PaymentGateway::class, StripePaymentGateway::class);
    }
}
