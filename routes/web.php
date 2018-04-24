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


Route::group(['middleware'=>'authen'], function(){
    /* Route lớp trưởng */
    Route::group(['prefix'=>'loptruong','middleware'=>'isLoptruong'], function(){
        Route::get('loptruong','LoptruongController@xem')->name('loptruong');
        Route::get('loptruong/tao','LoptruongController@index_lt')->name('loptruongtaoyc');
        Route::post('loptruong/tao','LoptruongController@tao')->name('loptruongtao');
        Route::post('loptruong/guirp','LoptruongController@report')->name('loptruongrp');
        Route::get('loptruong/xemrp','LoptruongController@xemrp')->name('loptruongxemrp');
        Route::post('loptruong/report', 'LoptruongController@report')->name('rp');
        Route::get('loptruong/rpcovan','LoptruongController@guirp')->name('guirpcovan');
    });
    Route::group(['prefix'=>'sinhvien','middleware'=>'isSinhvien'], function(){
        Route::get('sinhvien/tao','SinhvienController@index_sv')->name('svtaoyc');
        Route::get('sinhvien/xem','SinhvienController@xem')->name('svxem');
        Route::post('sinhvien/tao','SinhvienController@tao')->name('svtao');
        Route::get('sinhvien/xemrp','SinhvienController@xemrp')->name('svxemrp');
    });
    
    Route::group(['prefix'=>'covan','middleware'=>'isCovan'], function(){
        Route::get('covan','CovanController@xem')->name('covan');
        Route::get('covan/xem','CovanController@index_lt')->name('covanxem');
        Route::post('covan/guirp','CovanController@report')->name('covanguirp');
        Route::get('covan/xemrp','CovanController@xemrp')->name('covanxemrp');
        Route::post('covan/report', 'CovanController@report')->name('cvrp');
      
    });
});