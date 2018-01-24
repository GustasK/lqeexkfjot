<?php

use App\Http\Middleware\CheckAdmin;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/inbox', 'HomeController@inbox')->name('user.inbox');

Route::group(['prefix' => 'message'], function() {
    Route::get('/', 'MessageController@index');
    Route::post('/compose', 'MessageController@create')->name('message.compose');
});


Route::group(['middleware' => CheckAdmin::class, 'prefix' => 'admin'], function() {

    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/users', 'AdminController@users')->name('admin.users');

});








