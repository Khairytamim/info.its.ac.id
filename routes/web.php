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

Route::group(['prefix' => 'mailbox'], function () {
	Route::get('/', 'MailboxController@index')->name('mailbox');
	Route::get('/compose', 'MailboxController@compose')->name('addmailbox');
	Route::post('/compose', 'MailboxController@add')->name('compose');
	Route::post('/delete', 'MailboxController@delete')->name('deletemailbox');    
});

Route::group(['prefix' => 'trending'], function () {
	Route::get('/', 'TrendingController@index')->name('trending');  
});

Route::group(['prefix' => 'tanyakan'], function () {
	Route::get('/', 'PertanyaanController@index')->name('tanyakan');
	Route::post('/add', 'PertanyaanController@add')->name('addtanyakan'); 
	Route::get('/list', 'PertanyaanController@list')->name('listtanyakan');  
});

Route::group(['prefix' => 'organisasi'], function () {
	Route::get('/', 'OrganisasiController@index')->name('organisasi');  
});

Route::get('/home', 'HomeController@index')->name('home');
