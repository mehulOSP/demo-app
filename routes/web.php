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

// admin panel
Route::get('signup', 'UserController@signupView');
Route::post('signup', 'UserController@signup');

Route::get('/admin', 'UserController@index');
Route::post('login', 'UserController@login');



Route::get('dashboard', function () {
    return view('admin.dashboard');
});
Route::get('users/admin', 'UserController@get_user');
Route::delete('/users/admin/{id}', 'UserController@delete_user');

Route::get('users/students', function () {
    return view('admin.student-users');
});




