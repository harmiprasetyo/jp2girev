<?php

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register backend/admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify'=>true]);

/* Login */
Route::get('login', 'Auth\LoginController@showAdminLoginForm');
Route::post('login', 'Auth\LoginController@adminLogin');

/* Welcome */
Route::get('', 'Backend\WelcomeController@index');
//Route::get('home', 'Backend\WelcomeController@index');

/* Change Profile & Password */
Route::get('edit-profile', 'AdminController@profileForm');
Route::get('edit-password', 'AdminController@passwordForm');
Route::post('save-profile', 'AdminController@storeProfile');
Route::post('save-password', 'AdminController@storePassword');

/* Post */
Route::get('post/{module_name}', 'Backend\PostController@index');
Route::get('post/{module_name}/create', 'Backend\PostController@create');
Route::get('post/{module_name}/update/{id}', 'Backend\PostController@update');
Route::get('post/{module_name}/save/status/{id}/{status}', 'Backend\PostController@save_status');
Route::get('post/{module_name}/save/headline/{id}/{headline}', 'Backend\PostController@save_headline');
Route::get('post/{module_name}/save/home_status/{id}/{status}', 'Backend\PostController@save_home_status');
Route::post('post/{module_name}/save', 'Backend\PostController@save');
Route::get('post/{module_name}/delete/{id}', 'Backend\PostController@delete');
Route::get('post/{module_name}/delete-photo/{lang}/{id}', 'Backend\PostController@delete_photo');
Route::get('post/{module_name}/{id}', 'Backend\PostController@detail');