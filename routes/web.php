<?php

use App\Http\Middleware\CheckAdmin;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => CheckAdmin::class, 'prefix' => 'admin'], function() {

    Route::get('/', 'AdminController@index')->name('admin.index');

});








