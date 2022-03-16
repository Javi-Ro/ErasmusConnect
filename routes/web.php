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

    //USERS
    Route::get('/users/{user}',  'App\Http\Controllers\UserController@get');
    Route::get('/users', 'App\Http\Controllers\UserController@getUsers');
    Route::post('/users', 'App\Http\Controllers\UserController@create');
    Route::delete('/users/{user}', 'App\Http\Controllers\UserController@delete');

    //TAGS
    Route::get('/tags/{tag}',  'App\Http\Controllers\TagController@get');
    Route::get('/tags', 'App\Http\Controllers\TagController@getTags');
    Route::post('/tags', 'App\Http\Controllers\TagController@create');
    Route::delete('/tags/{tag}', 'App\Http\Controllers\TagController@delete');


    //Countries/cities
    Route::get('/countries', 'App\Http\Controllers\CountryController@getCountries');
    Route::post('/get_cities', 'App\Http\Controllers\CityController@getCitiesByCountry'); //EL POST TIENE QUE ESTAR!
    Route::get('/cities', 'App\Http\Controllers\CityController@getCities');


    //POSTS
    Route::get('/posts/{post}', 'App\Http\Controllers\PostController@get');
    Route::get('/posts', 'App\Http\Controllers\PostController@getPosts');
    Route::post('/posts', 'App\Http\Controllers\PostController@create');
    Route::delete('/posts/{post}', 'App\Http\Controllers\PostController@delete');
});

Route::get('/register', function () {
    return view('auth/register');
});
