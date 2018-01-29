<?php

use App\Http\Middleware\CheckAdmin;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/inbox', 'HomeController@inbox')->name('user.inbox');
Route::get('/profile', 'HomeController@profile')->name('user.profile');

Route::group(['prefix' => 'message'], function() {
    Route::get('/', 'MessageController@index');
    Route::post('/compose', 'MessageController@create')->name('message.compose');
});

/*  Chat routes */
Route::group(['middleware' => 'auth'], function() {

    Route::get('/chat', 'ChatController@index');
    Route::get('/messages', 'ChatController@getMessages');
    Route::post('/messages', 'ChatController@sendMessage');

});

/*  Admin routes */
Route::group(['middleware' => CheckAdmin::class, 'prefix' => 'admin'], function() {

    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/users', 'AdminController@users')->name('admin.users');

});








