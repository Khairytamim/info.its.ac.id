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

Route::group(['prefix' => 'admin/mailbox'], function () {
	Route::get('/', 'MailboxController@index')->name('mailbox');
	Route::get('/compose', 'MailboxController@compose')->name('addmailbox');
	Route::post('/compose', 'MailboxController@add')->name('compose');
	Route::post('/delete', 'MailboxController@delete')->name('deletemailbox'); 
	Route::get('/read', 'MailboxController@read')->name('readmail'); 
	Route::post('/balas', 'MailboxController@balas')->name('balas');
	Route::get('/sent', 'MailboxController@sent')->name('sent');    
	Route::get('/verifikasi', 'MailboxController@verifikasi')->name('verifikasi');
	Route::get('/konfirmasi', 'MailboxController@konfirmasi')->name('confirmation');    
	Route::get('/konfirmasi/add', 'MailboxController@konfirmasiadd')->name('confirmationadd');
	Route::post('/type/change', 'MailboxController@type')->name('changetype');
	// Route::post('/type/change', 'MailboxController@type')->name('changetype');    
	// Route::post('/pertanyaan/delete','MailboxController@delete')    


});

// Route::group(['prefix' => 'cek'], function () {
// 	Route::get('/', 'TagController@index')->name('cek');
// });

Route::group(['prefix' => 'admin/organisasi'], function () {
	Route::get('/', 'OrganisasiController@adminorganisasi')->name('adminorganisasi');
	Route::post('/update', 'OrganisasiController@update')->name('updateorganisasi');
});

Route::group(['prefix' => 'organisasi'], function () {
	Route::get('/', 'OrganisasiController@index')->name('organisasi');  
});

Route::group(['prefix' => 'laporan'], function () {
	Route::get('/', 'DataController@laporan')->name('laporan');
	Route::get('/search', 'DataController@search')->name('searchlaporan');    
});

Route::group(['prefix' => 'trending'], function () {
	Route::get('/', 'TrendingController@index')->name('trending');  
});

Route::group(['prefix' => 'tanyakan'], function () {
	Route::get('/', 'PertanyaanController@index')->name('tanyakan');
	Route::post('/add', 'PertanyaanController@add')->name('addtanyakan'); 
	Route::get('/list', 'PertanyaanController@list')->name('listtanyakan');  
});

// Route::get('/home', 'HomeController@index')->name('home');
