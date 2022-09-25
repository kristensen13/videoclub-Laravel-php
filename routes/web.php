<?php

// use GuzzleHttp\Middleware;
// use Illuminate\Routing\Route as RoutingRoute;
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

Route::get('/', 'HomeController@getHome');
Route::group(['Middleware' => 'auth'], function () {
    Route::get('catalog', 'CatalogController@getIndex');
    Route::get('catalog/show/{id}', 'CatalogController@getShow');
    Route::get('catalog/create', 'CatalogController@getCreate');
    Route::get('catalog/edit/{id}', 'CatalogController@getEdit');
    Route::post('catalog', 'CatalogController@postCreate');
    Route::put('catalog/edit/{id}', 'CatalogController@putEdit');
    Route::put('catalog/rented/{id}', 'CatalogController@putRented');
    Route::delete('catalog/{id}', 'CatalogController@deleteMovie');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
