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
    Route::post('configuration', 'ConfigurationController@store')->name('configuration.store');
    Route::post('projects/media', 'ConfigurationController@storeMedia')
  ->name('configuration.storeMedia');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/prueba', function () {
    setting()->set('foo', 'my vadsadslue');
    setting()->set('foo2', 'my vadsadslue');
    setting()->set('foo1', 'my vadsadslue');
    setting()->set('foo3', 'my vadsadslue');
    setting()->save();

    return 1;
});
