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
Route::get('/admin/reportes', function () {
    return view('/admin/home');
});

Route::get('/foro', function () {
    return view('foro');
});

Route::get('/profile/{nickname}', function($nickname) {
    $user = "";
    if(Auth::check())
        $user = auth()->user()->nickname;

    return view('profile', ["nickname"=>$nickname, "user"=>$user]);
});

Route::get('/publicacion/{publicacion}', function(){
    return view('foro.publicacion');
});


Route::group(['prefix' => 'api'], function () {

    //USERS
    Route::get('/users/{user}',  'App\Http\Controllers\UserController@get');
    Route::get('/users', 'App\Http\Controllers\UserController@getUsers');
    Route::post('/users', 'App\Http\Controllers\UserController@create');
    Route::delete('/users/{user}', 'App\Http\Controllers\UserController@delete');
    Route::put('/users/{user}', 'App\Http\Controllers\UserController@update');

    //TAGS
    Route::get('/tags/{tag}',  'App\Http\Controllers\TagController@get');
    Route::get('/tags', 'App\Http\Controllers\TagController@getTags');
    Route::post('/tags', 'App\Http\Controllers\TagController@create');
    Route::delete('/tags/{tag}', 'App\Http\Controllers\TagController@delete');
    Route::put('/tags/{tag}', 'App\Http\Controllers\TagController@update');

    //APARTMENTS
    Route::get('/apartments/{apartment}',  'App\Http\Controllers\ApartmentController@get');
    Route::get('/apartments', 'App\Http\Controllers\ApartmentController@getApartments');
    Route::post('/apartments', 'App\Http\Controllers\ApartmentController@create');
    Route::delete('/apartments/{apartment}', 'App\Http\Controllers\ApartmentController@delete');
    Route::put('/apartments/{apartment}', 'App\Http\Controllers\ApartmentController@update');
    Route::post('/apartments/order', 'App\Http\Controllers\ApartmentController@order');

    //COUNTRIES
    Route::get('/countries/{country}', 'App\Http\Controllers\CountryController@get');
    Route::get('/countries', 'App\Http\Controllers\CountryController@getCountries');
    Route::post('/countries', 'App\Http\Controllers\CountryController@create');
    Route::delete('/countries/{country}', 'App\Http\Controllers\CountryController@delete');
    Route::put('/countries/{country}', 'App\Http\Controllers\CountryController@update');

    //CITIES
    Route::post('/get_cities_by_country', 'App\Http\Controllers\CityController@getCitiesByCountry'); //EL POST TIENE QUE ESTAR!
    Route::post('/get_city_by_id', 'App\Http\Controllers\CityController@getCityById');
    Route::get('cities/{city}', 'App\Http\Controllers\CityController@get');
    Route::get('/cities', 'App\Http\Controllers\CityController@getCities');
    Route::post('/cities', 'App\Http\Controllers\CityController@create');
    Route::delete('/cities/{city}', 'App\Http\Controllers\CityController@delete');
    Route::put('/cities/{city}', 'App\Http\Controllers\CityController@update');

    //POSTS
    Route::get('/posts/{post}', 'App\Http\Controllers\PostController@get');
    Route::get('/posts', 'App\Http\Controllers\PostController@getPosts');
    Route::post('/posts', 'App\Http\Controllers\PostController@create');
    Route::delete('/posts/{post}', 'App\Http\Controllers\PostController@delete');
    Route::post('/posts/order', 'App\Http\Controllers\PostController@order');
    Route::put('/posts/{post}', 'App\Http\Controllers\PostController@update');
    Route::get('/posts/{post}/comments', 'App\Http\Controllers\PostController@getComments');

    Route::get('/auth', 'App\Http\Controllers\UserController@auth');
});

Route::get('/register', function () {
    return view('auth/register');
});

Route::post('/logout', 'App\Http\Controllers\UserController@logout');

Route::get('/foro', function () {
    return view('foro.foro');
});
Route::get('/apartments', function () {
    return view('apartments.apartment');
});
