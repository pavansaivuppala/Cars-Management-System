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

Route::get('/', [ 'uses' => 'Frontend\IndexController@home' ]);
Route::get('/car-details/{carId?}', ['uses' => 'Frontend\CarDetailsController@details'])->name('car_details');
Route::get('/category/{slug?}', ['uses' => 'Frontend\CarCategoryController@category'])->name('car_category');
Route::get('/brands/{slug?}', ['uses' => 'Frontend\BrandController@cars'])->name('car_brand');
Route::get('/contact-us', ['uses' => 'Frontend\ContactController@index'])->name('contact_us');
Route::post('/car-lead', 'Frontend\CarDetailsController@saveLead');
Route::post('/search', 'Frontend\IndexController@searchCars');

// Dealer Page
Route::get('/dealer/{dealerId?}', ['uses' => 'Frontend\DealerController@index']);


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'panel', 'middleware' => 'auth'], function() {
    Route::get('dashboard', 'DashboardController@index')->name('panel_dashboard');

    Route::group(['prefix' => 'leads', 'namespace' => 'Leads'], function() {
        Route::get('list', 'LeadController@list')->name('lead_list');
    });

    Route::group(['prefix' => 'cars', 'namespace' => 'Cars'], function() {
        Route::get('list', 'CarController@list')->name('car_list');
        Route::get('add', 'CarController@add')->name('car_add');
        Route::post('update', 'CarController@update')->name('car_update');
        Route::post('create', 'CarController@create')->name('car_create');
        Route::post('filter', 'CarController@carFilters');
        Route::get('edit/{car_id}', 'CarController@edit')->name('car_edit');
        Route::get('view/{car_id}', 'CarController@view')->name('car_view');
    });

    Route::group(['prefix' => 'settings', 'namespace' => 'Settings'], function() {
        Route::get('reset-password', 'PasswordController@resetPassword')->name('reset_password');
        Route::post('reset-password-action', 'PasswordController@resetPasswordAction')->name('reset_password_action');
    });

    Route::get('user-profile', 'Profile\ProfileController@profile')->name('user_profile');
    Route::post('save-user-profile', 'Profile\ProfileController@saveProfile')->name('save_user_profile');
});
