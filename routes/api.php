<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register the API routes for your application as
| the routes are automatically authenticated using the API guard and
| loaded automatically by this application's RouteServiceProvider.
|
*/

Route::group([
    'middleware' => 'auth:api'
], function () {

});

Route::get('/listing/categories', 'CategoryController@index');

//Route::post('/listing/{id}/activate', 'Listing\ActivateController@store');
//Route::post('/listing/store', 'Listing\ListingController@store');
//Route::put('/listing/{id}/update/general', 'Listing\GeneralInformationController@update');
//Route::put('/listing/{id}/update/plan', 'Listing\PlanInformationController@update');
//Route::put('/listing/{id}/update/feature', 'Listing\FeatureInformationController@update');
//Route::put('/listing/{id}/update/media', 'Listing\MediaInformationController@update');

//Route::post('/listing/{id}/coupon/redeem', 'Listing\RedeemCouponController@redeem');
//Route::post('/listing/{id}/coupon/remove', 'Listing\RedeemCouponController@remove');
//
//Route::post('/listing/{id}/images/remove', 'Listing\ImageController@remove');
//Route::post('/listing/{id}/images/updateOrder', 'Listing\ImageController@update');
//Route::post('/listing/{id}/images/upload', 'Listing\ImageController@store');
//
//Route::get('/listing/addons', 'AddOnController@index');
//Route::get('/listing/amenities/{category}', 'AmenitiesController@find');
//Route::get('/listing/plan/{category}', 'PlanController@find');
