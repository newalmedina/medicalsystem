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
    Route::get('/logoutUser', 'UserController@logout')->name("logoutUser");
    Route::get('/', 'DashboardController@index')->name('dashboard');

    //configuration
    Route::get('configuration', 'ConfigurationController@index')->name('configuration');
    Route::get('configuration-resorce', 'ConfigurationController@getConfigResource')->name('configuration.getConfigResource');
    Route::get('configuration-delete-resorce', 'ConfigurationController@deleteResource')->name('configuration.deleteResource');
    Route::post('configuration', 'ConfigurationController@store')->name('configuration.store');
    Route::post('temporal-files', 'TemporalFileController@storeMedia')->name('temporalFiles.storeMedia');

    //personal
    Route::post('personal', 'UserController@store')->name('personal.store');
    Route::get('personal', 'UserController@index')->name('personal');
    Route::get('get-personal-admin', 'UserController@getAdmins')->name('personal.getAdmins');
    Route::get('get-personal-secretary', 'UserController@getSecretaries')->name('personal.getSecretaries');
    Route::get('get-personal-doctor', 'UserController@getDoctors')->name('personal.getDoctors');
    Route::get('get-personal-admin', 'UserController@getAdmins')->name('personal.getAdmins');
    Route::get('personal-delete/{id}', 'UserController@destroy')->name('personal.destroy');
    Route::get('personal-show/{id}', 'UserController@show')->name('personal.show');
    Route::post('personal-update/{id}', 'UserController@update')->name('personal.update');

    //Specialty
    Route::post('specialty', 'SpecialtyController@store')->name('specialty.store');
    Route::get('specialty', 'SpecialtyController@index')->name('specialty');
    Route::get('get-specialty', 'SpecialtyController@getSpecialties')->name('specialty.getSpecialties');
    Route::get('specialty-delete/{id}', 'SpecialtyController@destroy')->name('specialty.destroy');
    Route::get('specialty-show/{id}', 'SpecialtyController@show')->name('specialty.show');
    Route::post('specialty-update/{id}', 'SpecialtyController@update')->name('specialty.update');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/prueba', function () {
    return Hash::make("secret");
});
