<?php

use App\Http\Middleware\CheckAdmin;
use App\Events\MessagePosted;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/inbox', 'HomeController@inbox')->name('user.inbox');

Route::get('/profile', 'HomeController@profile')->name('user.profile');

Route::group(['prefix' => 'message'], function() {
    Route::get('/', 'MessageController@index');
    Route::post('/compose', 'MessageController@create')->name('message.compose');
});

Route::get('/chat', function() {
    return view('chat.index');
});

Route::get('/messages', function () {
    return App\Message::with('user')->get();
});

Route::post('/messages', function() {
    $user = Auth::user();

    $message = $user->messages()->create([
        'message' => request()->get('message')
    ]);

    broadcast(new MessagePosted($message, $user))->toOthers();

    return ['status' => 'OK'];
})->middleware('auth');

Route::group(['middleware' => CheckAdmin::class, 'prefix' => 'admin'], function() {

    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/users', 'AdminController@users')->name('admin.users');

});








