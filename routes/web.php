<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();




Auth::routes(['verify' => true]);

Route::middleware('auth:web')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/today_bookings', 'HomeController@today_bookings')->name('today_bookings');

    Route::resource('categories', 'CategoryController')->middleware('permission:Categories');
    Route::get('/select/subcategories/{category_id}', 'CategoryController@select')->middleware('permission:Categories');
    Route::get('/select/categories/{all}', 'CategoryController@pSelect')->middleware('permission:Categories');

    Route::resource('regions', 'RegionController')->middleware('permission:Regions');

    Route::resource('suburbs', 'SuburbController')->middleware('permission:Suburbs');
    Route::get('/suburbs/select/{region_id}', 'SuburbController@select')->middleware('permission:Suburbs');

    Route::resource('ads', 'AdsController')->middleware('permission:Ads');

    Route::resource('clients', 'ClientsController')->middleware('permission:Clients');

    Route::resource('informativeDatas', 'InformativeDataController')->middleware('permission:Informative Datas');

    Route::resource('fAQS', 'FAQController')->middleware('permission:FAQS');

    Route::resource('contactuses', 'ContactUsController')->middleware('permission:Contact Us');

    Route::resource('complainTypes', 'ComplainTypesController')->middleware('permission:Complain Types');

    Route::resource('specializations', 'SpecializationController')->middleware('permission:Specializations');

    Route::resource('complains', 'ComplainsController')->middleware('permission:Complains');

    Route::resource('admins', 'AdminController')->middleware('permission:Admins');

    Route::resource('roles', 'RolesController')->middleware('permission:Roles');

    Route::resource('permissions', 'PermissionsController')->middleware('permission:Permissions');

    Route::resource('coupons', 'CouponController')->middleware('permission:coupons');

    Route::resource('clinics', 'ClinicController')->middleware('permission:Clinics');

    Route::resource('offers', 'OfferController')->middleware('permission:Offers');

    Route::get('type_offers', 'OfferController@type_offers')->middleware('permission:Offers')->name('type_offers');

    Route::get('type_offers/{id}', 'OfferController@updatetype')->middleware('permission:Offers')->name('type_offerss');

    Route::post('type_offerss/{id}', 'OfferController@updatetypeoffers')->middleware('permission:Offers')->name('type_offersss');


    Route::resource('brands', 'BrandController')->middleware('permission:Brands');

    Route::resource('reviews', 'ReviewController')->middleware('permission:Reviews');

    Route::get('/all', 'SpecializationController@all')->middleware('permission:Specializations');

    Route::resource('bookings', 'BookingController')->middleware('permission:Booking');

    Route::resource('wallets', 'WalletController')->middleware('permission:Wallet');

    Route::resource('sliders', 'SliderController');

    Route::resource('notifications', 'NotificationController');

    Route::get('/hide/{id}', 'ReviewController@hide')->name('hide_review')->middleware('permission:Reviews');
});
