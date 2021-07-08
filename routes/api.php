<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/clients/register', 'ClientsAPIController@store');
Route::post('/clients/login', 'ClientsAPIController@login');
Route::post('/clients/social_login', 'ClientsAPIController@social_login');
Route::post('/clients/send_code', 'ClientsAPIController@send_code');
Route::post('/clients/check_code', 'ClientsAPIController@check_code');
Route::post('/clients/forget_password', 'ClientsAPIController@forget_password');

Route::middleware('auth:api')->group(function () {
    Route::post('/clients/edit_profile', 'ClientsAPIController@update');
    Route::post('/clients/logout', 'ClientsAPIController@logout');
    Route::post('/clients/change_password', 'ClientsAPIController@change_password');
    Route::get('/client', 'ClientsAPIController@show');
    Route::post('/clients/complains', 'ComplainsAPIController@store');
    Route::post('/clients/favourite', 'FavouriteAPIController@favourite');
    Route::get('/clients/favourite_list', 'FavouriteAPIController@index');
    Route::post('/clients/review', 'ReviewAPIController@store');
    Route::get('/clients/bookings', 'BookingAPIController@index');
    Route::post('/clients/booking', 'BookingAPIController@store');
    Route::post('/clients/bookings/cancel/{id}', 'BookingAPIController@cancel');
    Route::get('/clients/booking/{id}', 'BookingAPIController@show');
    Route::post('/clients/charge', 'WalletAPIController@store');
    Route::get('/clients/wallet', 'WalletAPIController@wallet');
    Route::get('/notifications', 'NotificationAPIController@index');
    Route::get('/notifications/count', 'NotificationAPIController@count');
});

Route::get('/categories', 'CategoryAPIController@index');
Route::get('/subcategories/{category_id}', 'CategoryAPIController@subcategories');
Route::get('/categories/{all}', 'CategoryAPIController@index');

Route::resource('regions', 'RegionAPIController');

Route::get('/suburbs/{region_id}', 'SuburbAPIController@index');

Route::resource('ads', 'AdsAPIController');

// Route::resource('clients', 'ClientsAPIController');

Route::get('/informative/{data}', 'InformativeDataAPIController@index');

Route::resource('faqs', 'FAQAPIController');

Route::resource('contactus', 'ContactUsAPIController');

Route::resource('complain_types', 'ComplainTypesAPIController');

Route::post('specializations', 'SpecializationAPIController@index');
Route::get('/specialization/{id}', 'SpecializationAPIController@show');



Route::get('/coupon/{code}', 'CouponAPIController@show');

Route::resource('clinics', 'ClinicAPIController');

Route::get('/offers/{type}', 'SpecializationAPIController@offers');
Route::get('/offers/{type}/{all}', 'SpecializationAPIController@offers');

Route::resource('brands', 'BrandAPIController');

Route::resource('sliders', 'SliderAPIController');

// Route::get('/callback', 'ClientsAPIController@callback');
// Route::get('/redirect', 'ClientsAPIController@redirect');



