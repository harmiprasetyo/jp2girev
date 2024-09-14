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

//Auth::routes(['verify'=>true]);

Route::get('locale/{locale}', function ($locale){
  Session::put('locale', $locale);
  return redirect()->back();
});

Route::get('/', 'Frontend\HomeController@index');
Route::get('', 'Frontend\HomeController@index');
Route::get('home', 'Frontend\HomeController@index');
Route::get('web/home', 'Frontend\HomeController@index');
Route::post('web/pendaftaran-anggota/save', 'Frontend\PostController@saveContactMember');
Route::post('web/contact-cooperate/save', 'Frontend\PostController@saveContactCooperate');
Route::post('web/contact-other-info/save', 'Frontend\PostController@saveContactInfo');
Route::post('web/contact-us/save', 'Frontend\PostController@saveContactUs');
Route::get('web/{module_name}', 'Frontend\PostController@index');
Route::get('web/{module_name}/{id}', 'Frontend\PostController@detail');

// Route::get('/', 'Frontend\HomeController@index');

// Route::get('deposit', 'Frontend\DepositController@index');
// Route::get('uang-saku', 'Frontend\UangSakuController@index');
// Route::get('spp', 'Frontend\SppController@index');
// Route::get('contact-us', 'Frontend\ContactUsController@index');

// Route::get('sendmail', 'Frontend\SendMailController@index');
