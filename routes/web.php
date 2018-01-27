<?php

use App\Http\Middleware\CheckAdmin;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

<<<<<<< HEAD
Route::get('/inbox', 'HomeController@inbox')->name('user.inbox');

Route::group(['prefix' => 'message'], function() {
    Route::get('/', 'MessageController@index');
    Route::post('/compose', 'MessageController@create')->name('message.compose');
});

=======
Route::post('/updateInfo', 'UpdateController@create')->name('updateInfo');


Route::get('/updateInfo', function (){
    return view('updateInfo');
});
>>>>>>> uploading picture fixed

Route::group(['middleware' => CheckAdmin::class, 'prefix' => 'admin'], function() {

    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/users', 'AdminController@users')->name('admin.users');

});








