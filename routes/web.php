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

Route::group(['middleware'=>['auth'], 'namespace'=>'Panel', 'prefix'=>'cpanel'], function(){
    Route::get('/', 'HomeController@index')->name('panel.home');
    //cliente
    Route::get('users', 'UserController@index')->name('panel.users.index');
    Route::get('users/create', 'UserController@create')->name('panel.users.create');
    Route::post('users/create', 'UserController@store')->name('panel.users.store');
    Route::get('users/{id}/edit', 'UserController@edit')->name('panel.users.edit');
    Route::get('profile', 'UserController@profile')->name('panel.profile.index');
    Route::post('users/{id}', 'UserController@update')->name('panel.users.update');
    Route::get('reset/password', 'UserController@resetPassword')->name('panel.users.view.reset');
    Route::post('reset/password', 'UserController@reset')->name('panel.users.reset.password');
    Route::get('users/{id}', 'UserController@destroy')->name('panel.users.destroy');
    //galeria
    Route::get('galerias', 'GaleriaController@index')->name('panel.galeria.index');
    Route::get('galeria/create', 'GaleriaController@create')->name('panel.galeria.create');
    Route::post('galeria/create', 'GaleriaController@store')->name('panel.galeria.store');
    Route::get('galeria/{id}/edit', 'GaleriaController@edit')->name('panel.galeria.edit');
    Route::post('galeria/{id}', 'GaleriaController@update')->name('panel.galeria.update');
    Route::post('galeria/images/{id}', 'GaleriaController@images')->name('panel.galeria.send.images');
    Route::get('galeria/{id}', 'GaleriaController@destroy')->name('panel.galeria.destroy');
    Route::get('galeria/{id}/view', 'GaleriaController@show')->name('panel.galeria.show');
    Route::get('galeria/{id}/view', 'GaleriaController@show')->name('panel.galeria.show');

});

Route::get('/', 'Site\SiteController@index')->name('home');
//Route::get('/cpanel', 'Panel\HomeController@index')->name('panel.home');

Auth::routes();
