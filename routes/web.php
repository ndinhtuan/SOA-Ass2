<?php

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
    return view('welcome');
})->name('welcome');

Route::get('login','Auth\LoginController@getLogin')->name('login');
Route::post('login','Auth\LoginController@postLogin')->name('login');
Route::get('logout','Auth\LogoutController@logout')->name('logout');