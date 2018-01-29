<?php

use App\Http\Middleware\CheckAdmin;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/updateInfo', 'UpdateController@create')->name('updateInfo');

Route::get('/updateInfo', function (){
    return view('updateInfo');
});

Route::group(['middleware' => CheckAdmin::class, 'prefix' => 'admin'], function() {

    Route::get('/', 'AdminController@index')->name('admin.index');

});
Route::get('/inbox', 'HomeController@inbox')->name('user.inbox');









