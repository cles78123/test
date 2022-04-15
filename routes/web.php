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

//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('register.post');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/', 'AdminLTEController@index');
Route::get('home', 'AdminLTEController@index');
Route::get('insert','AdminLTEController@insert');
Route::post('insert','AdminLTEController@insert')->name('insert');
Route::get('edit/{user_id}','AdminLTEController@edit');
Route::post('update','AdminLTEController@update')->name('update');
Route::get('delete/{user_id}','AdminLTEController@delete');
Route::post('search', 'AdminLTEController@search');

Route::get('hamlet', 'HamletController@index');
Route::post('hamlet/search', 'HamletController@search');