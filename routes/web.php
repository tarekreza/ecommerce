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

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@loginCheck')->name('login.check');

Route::get('/signup', 'AuthController@signup')->name('signup');
Route::post('register','AuthController@register')->name('register');

Route::group(['prefix' => 'admin','namespace' => 'Admin', 'middleware' => 'auth.admin'], function(){
    
    Route::get('dashboard', 'DashboardController@index')->name('adminDashboard');
    Route::get('categories', 'CategoryController@index')->name('adminCategory');
    Route::get('add-category', 'CategoryController@create')->name('addCategory');
    Route::post('store-category', 'CategoryController@store')->name('storeCategory');


});
