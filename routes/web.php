<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@show');
Route::get('/auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('/listings', 'Listing\SearchController@show');

Route::group(array('middleware' => 'auth'), function() {
    Route::get('/dashboard', 'DashboardController@show');
    Route::post('/listing/store', 'Listing\ListingController@store');
    Route::put('/listing/{listing}/update/general', 'Listing\GeneralInformationController@update');
    Route::put('/listing/{listing}/update/plan', 'Listing\PlanInformationController@update');
    Route::put('/listing/{listing}/update/feature', 'Listing\FeatureInformationController@update');
    Route::put('/listing/{listing}/update/media', 'Listing\MediaInformationController@update');
    Route::put('/listing/{listing}/update/addon', 'Listing\AddonInformationController@update');

    Route::get('/listing/edit/{listing}', 'Listing\ListingController@edit');

    Route::post('/listing/{listing}/coupon/redeem', 'Listing\RedeemCouponController@redeem');
    Route::post('/listing/{listing}/coupon/remove', 'Listing\RedeemCouponController@remove');

    Route::post('/listing/{listing}/images/remove', 'Listing\ImageController@remove');
    Route::post('/listing/{listing}/images/updateOrder', 'Listing\ImageController@update');
    Route::post('/listing/{listing}/images/upload', 'Listing\ImageController@store');

    Route::get('/listing/addons', 'AddOnController@index');
    Route::get('/listing/amenities/{category}', 'AmenitiesController@find');
    Route::get('/listing/plan/{category}', 'PlanController@find');

    Route::post('/listing/{listing}/activate', 'Listing\ActivateController@store');
});

Route::get('/listing/{listing}', 'Listing\ListingController@show');
