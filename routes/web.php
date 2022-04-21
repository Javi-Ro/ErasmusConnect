<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;

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

// AUTH ROUTES

Auth::routes();
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
Route::post('/logout', 'App\Http\Controllers\UserController@logout')->name('logout');
Route::get('/register', function () {
    if (Auth::guest()) {
        return view('auth/register');
    }

    return redirect(RouteServiceProvider::HOME);
});

// ADMIN ROUTES

Route::get('/admin/reports', function () {
    return view('/admin/home');
});
Route::get('/admin/countries', function () {
    return view('/admin/paisesAdmin');
});
Route::get('/admin/tags', function () {
    return view('/admin/etiquetasAdmin');
});
Route::get('/admin/cities', function () {
    return view('/admin/ciudadesAdmin');
});


Route::get('/admin/posts', function () {
    return view('/admin/posts');
});

Route::get('/admin/users', function () {
    return view('/admin/usuarios');
});

// VIEWS ROUTES

Route::get('/admin/users', function () {
    return view('/admin/usuarios');
});

// VIEWS ROUTES

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/{nickname}/profile', function ($nickname) {
    $user = "";
    if (Auth::check())
        $user = auth()->user()->nickname;

    return view('profile', ["nickname" => $nickname, "user" => $user]);
});

Route::get('/publicacion/{publicacion}', function($id){
    $post = App\Models\Post::whereId($id)->first();

    return view('foro.publicacion')->with('post', $post);
});

Route::get('/profile/{user}/followers', 'App\Http\Controllers\UserController@listFollowers');
Route::get('/followers/{user1}/{user2}', 'App\Http\Controllers\UserController@addFollower'); //TODO: maybe a post? review 

Route::get('/publicacion', function(){
    return view('foro.publicacion');
});

Route::get('/foro', function () {
    return view('foro.foro');
});

Route::get('/apartments', function () {
    return view('apartments.apartment');
});

Route::get('/foro/crear', function () {
    return view('foro.crearpublicacion');
});

Route::get('/alquileres', function () {
    return view('alquileres.main');
});


// API ROUTES

Route::group(['prefix' => 'api'], function () {

    //USERS
    Route::get('/users/{user}',  'App\Http\Controllers\UserController@get');
    Route::get('/users', 'App\Http\Controllers\UserController@getUsers');
    Route::post('/users', 'App\Http\Controllers\UserController@create');
    Route::delete('/users/{user}', 'App\Http\Controllers\UserController@delete');
    Route::patch('/users/{user}', 'App\Http\Controllers\UserController@update');

    //TAGS
    Route::get('/tags/posts', 'App\Http\Controllers\TagController@getPostsTags');
    Route::get('/tags/{tag}',  'App\Http\Controllers\TagController@get');
    Route::get('/tags', 'App\Http\Controllers\TagController@getTags');
    Route::patch('/tags/{tag}', 'App\Http\Controllers\TagController@update');
    Route::post('/tags', 'App\Http\Controllers\TagController@create');
    Route::delete('/tags/{tag}', 'App\Http\Controllers\TagController@delete');

    //APARTMENTS
    Route::get('/apartments/{apartment}',  'App\Http\Controllers\ApartmentController@get');
    Route::get('/apartments', 'App\Http\Controllers\ApartmentController@getApartments');
    Route::post('/apartments', 'App\Http\Controllers\ApartmentController@create');
    Route::delete('/apartments/{apartment}', 'App\Http\Controllers\ApartmentController@delete');
    Route::post('/apartments/order', 'App\Http\Controllers\ApartmentController@order');
    Route::patch('/apartments/{apartment}', 'App\Http\Controllers\ApartmentController@update');

    //COUNTRIES
    Route::get('/countries/{country}', 'App\Http\Controllers\CountryController@get');
    Route::get('/countries', 'App\Http\Controllers\CountryController@getCountries');
    Route::post('/countries', 'App\Http\Controllers\CountryController@create');
    Route::put('/countries/{country}', 'App\Http\Controllers\CityController@update');
    Route::delete('/countries/{country}', 'App\Http\Controllers\CountryController@delete');
    Route::patch('/countries/{country}', 'App\Http\Controllers\CountryController@update');

    //CITIES
    Route::post('/get_cities_by_country', 'App\Http\Controllers\CityController@getCitiesByCountry'); //EL POST TIENE QUE ESTAR!
    Route::post('/get_city_by_id', 'App\Http\Controllers\CityController@getCityById');
    Route::get('cities/{city}', 'App\Http\Controllers\CityController@get');
    Route::get('/cities', 'App\Http\Controllers\CityController@getCities');
    Route::post('/cities', 'App\Http\Controllers\CityController@create');
    Route::delete('/cities/{city}', 'App\Http\Controllers\CityController@delete');
    Route::patch('/cities/{city}', 'App\Http\Controllers\CityController@update');

    //POSTS
    Route::get('/posts/filter-by-tag', 'App\Http\Controllers\PostController@filterByTag');
    Route::get('/posts/{post}', 'App\Http\Controllers\PostController@get');
    Route::get('/posts', 'App\Http\Controllers\PostController@getPosts');
    Route::post('/posts', 'App\Http\Controllers\PostController@create');
    Route::delete('/posts/{post}', 'App\Http\Controllers\PostController@delete');
    Route::post('/posts/order', 'App\Http\Controllers\PostController@order');
    Route::patch('/posts/{post}', 'App\Http\Controllers\PostController@update');
    Route::get('/posts/{post}/comments', 'App\Http\Controllers\PostController@getComments');

    Route::get('/auth', 'App\Http\Controllers\UserController@auth');

    //REPORTS
    Route::get('/reports/{report}', 'App\Http\Controllers\ReportController@get');
    Route::get('/reports', 'App\Http\Controllers\ReportController@getReports');
    Route::post('/reports', 'App\Http\Controllers\ReportController@create');
    Route::patch('/reports/{report}', 'App\Http\Controllers\ReportController@update');
    Route::delete('/reports/{report}', 'App\Http\Controllers\ReportController@delete');
});

Route::post('/logout', 'App\Http\Controllers\UserController@logout')->name('logout');