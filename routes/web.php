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

Route::get('/', 'CommentController@index');

Route::get('register', function() {
    return view('auth.register');
});

Route::resource('comments', 'CommentController')->except([
    'index', 'create', 'show', 'edit', 'update',
]);

Auth::routes();
