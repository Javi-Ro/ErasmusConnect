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

Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::group(['prefix' => 'api'], function () {
    Route::get('/users/{user}',  'App\Http\Controllers\UserController@get');
    Route::post('/users', 'App\Http\Controllers\UserController@create');
    Route::get('/get_countries', 'App\Http\Controllers\CountryController@getCountries');
    Route::post('/get_cities', 'App\Http\Controllers\CityController@getCitiesByCountry');
});

Route::get('/example', function() {
    return view('auth/register');
});
