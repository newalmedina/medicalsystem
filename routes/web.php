<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
//use anlutro\LaravelSettings\Facade as Setting;


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
    return view('backoffice.dashboard');
});

//BACKOFFICE ROUTES
Route::group(['middleware' => ['auth'], 'prefix' => 'backoffice'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    //configuration
    Route::get('configuration', 'ConfigurationController@index')->name('configuration');
    Route::get('configuration-resorce', 'ConfigurationController@getConfigResource')->name('configuration.getConfigResource');
    Route::get('configuration-delete-resorce', 'ConfigurationController@deleteResource')->name('configuration.deleteResource');
    Route::post('configuration', 'ConfigurationController@store')->name('configuration.store');
    Route::post('temporal-files', 'TemporalFileController@storeMedia')->name('temporalFiles.storeMedia');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/prueba', function () {
    return Hash::make("secret");
});
