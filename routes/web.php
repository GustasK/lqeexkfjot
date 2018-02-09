<?php

use App\Http\Middleware\CheckAdmin;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/update', 'Auth\UpdateController@create')->name('update');

Route::get('/update', function (){
    return view('update');
});

Route::get('/profile', 'MyProfileController@display');

Route::post('/profile', 'MyProfileController@update')->name('profile');

Route::group(['middleware' => CheckAdmin::class, 'prefix' => 'admin'], function() {

    Route::get('/', 'AdminController@index')->name('admin.index');

});

Route::get('/inbox', 'HomeController@inbox')->name('user.inbox');

Route::get('/search', 'SearchController@get');









