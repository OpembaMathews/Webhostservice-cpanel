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

// Authentication Routes...
Auth::routes();

Route::post('user/create', 'Auth\RegisterController@create');

//Route::get('login', 'AuthController@showLoginForm')->name('login');
//Route::post('login', 'AuthController@login');
//Route::get('logout', 'AuthController@logout')->name('logout');

// Registration Routes...
//Route::get('register', 'AuthController@showRegistrationForm')->name('register');

//Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
// Route::get('password/reset', 'AuthController@getRemind')->name('password.request');
// Route::post('password/email', 'AuthController@postRemind')->name('password.email');
// Route::get('password/reset/{token}', 'AuthController@getReset')->name('password.reset');
// Route::post('password/reset', 'AuthController@postReset')->name('password.request');


// Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/dashboard', 'HomeController@index')->name('home');

// Admin  Routes
Route::group(['middleware' => ['admin']], function () {
    Route::get('admin/dashboard', 'AdminController@index')->name('admin.home');
    Route::get('admin/customers', 'AdminController@customers')->name('admin.customers');
    Route::get('delete/user/{id}', 'AdminController@deleteUser');
    Route::get('edit/user/{id}', 'AdminController@editUser');
    Route::post('admin/updateuser', 'AdminController@updateUser');
    Route::get('admin/vouchers','AdminController@vouchers');
    Route::view('admin/generateVoucher', 'admin.voucher.create');
    Route::post('admin/generateVoucher', 'AdminController@generate');
});


// User Routes
Route::get('profile','UserController@viewProfile');
Route::post('profileupdate', 'UserController@updateProfile');
Route::post('changepassword', 'UserController@changePassword');
Route::get('billing', 'UserController@billing');

// Domain Routes
Route::get('domain','DomainController@index');
Route::post('domain/create', 'DomainController@create');
Route::get('domain/show', 'DomainController@show');
Route::delete('domain/delete', 'DomainController@delete');
Route::post('domain/check', 'DomainController@check');



