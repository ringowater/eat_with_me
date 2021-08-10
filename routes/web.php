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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostController');

Route::resource('comments', 'CommentController');

Route::resource('users', 'UserController');

Route::resource('event_requests', 'Event_requestController');

Route::resource('contacts', 'ContactController');

Route::prefix('notification')->middleware('auth')->group(function(){

Route::get('/', [NotificationController::class, 'index'])->name('notification.index');
    
Route::get('/list', [NotificationController::class, 'list'])->name('notification.list');
    
Route::get('/{notification}', [NotificationController::class, 'show'])->name('notification.show');

});
