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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index');

Route::get('/test', 'HomeController@phpinfo');

Route::get('/admin', function () {
    return redirect('/admin/mailbox');
});

Route::get('/script', '\App\Http\Controllers\PertanyaanController@script');
// Auth::routes();

Route::group(['prefix' => 'admin/mailbox'], function () {
	Route::get('/', 'MailboxController@index')->name('mailbox');
	Route::get('/compose', 'MailboxController@compose')->name('addmailbox');
	Route::post('/compose', 'MailboxController@add')->name('compose');
	Route::post('/delete', 'MailboxController@delete')->name('deletemailbox'); 
	Route::get('/read', 'MailboxController@read')->name('readmail'); 
	Route::post('/balas', 'MailboxController@balas')->name('balas');
	Route::get('/sent', 'MailboxController@sent')->name('sent');
	Route::get('/label', 'MailboxController@label')->name('label');     
	Route::get('/verifikasi', 'MailboxController@verifikasi')->name('verifikasi');
	Route::get('/konfirmasi', 'MailboxController@konfirmasi')->name('confirmation');    
	Route::get('/konfirmasi/add', 'MailboxController@konfirmasiadd')->name('confirmationadd');
	Route::post('/type/change', 'MailboxController@type')->name('changetype'); 

});


// Route::group(['prefix' => 'cek'], function () {
// 	Route::get('/', 'TagController@index')->name('cek');
// });

Route::group(['prefix' => 'admin/organisasi'], function () {
	Route::get('/', 'OrganisasiController@adminorganisasi')->name('adminorganisasi');
	Route::post('/update', 'OrganisasiController@update')->name('updateorganisasi');
});

Route::group(['prefix' => 'admin/offline'], function () {
	Route::get('/', 'LayananOfflineController@create')->name('offline.create');
	Route::post('/add/informasi', 'LayananOfflineController@add')->name('offline.add.informasi');
	Route::post('/add/gratifikasi', 'LayananOfflineController@addGratifikasi')->name('offline.add.gratifikasi');
	Route::post('/add/keberatan', 'LayananOfflineController@addKeberatan')->name('offline.add.keberatan');
	Route::get('/cetak/{pertanyaan}', '\App\Http\Controllers\LayananOfflineController@cetak')->name('offline.cetak');
	// Route::post('/update', 'LayananOfflineController@update')->name('updateorganisasi');
});

Route::group(['prefix' => 'admin/users'], function () {
	Route::get('/', 'UserController@index')->name('users');
	Route::post('/add', 'UserController@add')->name('adduser');

});
Route::group(['prefix' => 'admin/data', 'middleware' => 'auth'], function () {
	Route::get('/', 'DataController@admin')->name('data');
	Route::post('/add/file', 'DataController@addFile')->name('addfile');
	Route::post('/add/url', 'DataController@addURL')->name('addURL');
	Route::post('/delete', 'DataController@delete')->name('deletedata');



	// Route::post('/add', 'UserController@add')->name('adduser');

});
Route::group(['prefix' => 'admin/statistik', 'middleware' => 'auth'], function () {
	Route::get('/', 'StatistikController@index')->name('statistik');
	Route::get('/get/response', 'StatistikController@respon')->name('respon');
	Route::get('/export', 'StatistikController@export')->name('export');
});

Route::group(['prefix' => 'organisasi'], function () {
	Route::get('/', 'OrganisasiController@index')->name('organisasi'); 
});

Route::group(['prefix' => 'laporan'], function () {
	Route::get('/', 'DataController@laporan')->name('laporan');
	Route::get('/search', 'DataController@search')->name('searchlaporan');    
});

Route::group(['prefix' => 'tanyakan'], function () {
	Route::get('/', 'PertanyaanController@index')->name('tanyakan');
	Route::post('/add', 'PertanyaanController@add')->name('addtanyakan');
	Route::post('/add/gratifikasi', 'PertanyaanController@createGratifikasi')->name('gratifikasi');
	Route::post('/add/keberatan', 'PertanyaanController@createKeberatan')->name('keberatan');
	Route::post('/add/sengketa', 'PertanyaanController@createSengketa')->name('sengketa');
	Route::post('/add/wewenang', 'PertanyaanController@createWewenang')->name('wewenang');
	Route::get('/list', 'PertanyaanController@list')->name('listtanyakan');  
});
Route::group(['prefix' => 'photos'], function () {
	Route::get('/', 'PhotosController@index')->name('photos');
	Route::post('/store', 'PhotosController@store')->name('storePhoto');
});

Route::group(['prefix' => 'menu'], function () {
	Route::get('/{menu}', 'MenusController@menusIndex')->name('menu.index');
	Route::get('/{menu}/{subMenu}', 'MenusController@submenusIndex')->name('submenu.index');
});

Route::group(['prefix' => 'admin/menu'], function () {
	Route::get('/', 'MenusController@adminIndex')->name('admin.menu.index');
	Route::post('/add', 'MenusController@add')->name('admin.menu.add');
	Route::post('/{menu}/update', 'MenusController@update')->name('admin.menu.update');
	Route::get('/{menu}', 'MenusController@adminSubMenusIndex')->name('admin.menu.subMenu.index');
	Route::post('/delete', 'MenusController@delete')->name('admin.menu.delete');
});

Route::group(['prefix' => 'admin/sub-menu'], function () {
	// Route::get('/', 'MenusController@adminIndex')->name('admin.menu.index');
	Route::post('/{subMenu}/update', 'SubMenusController@update')->name('admin.subMenu.update');
	Route::post('/{menu}/add', 'SubMenusController@add')->name('admin.subMenu.add');
	Route::get('/{subMenu}', 'SubMenusController@adminIndex')->name('admin.subMenu.index');
	Route::post('/delete', 'SubMenusController@delete')->name('admin.subMenu.delete');

});


Route::group(['prefix' => 'admin/banner'], function () {
	Route::get('/', 'BannerController@adminIndex')->name('admin.banner.index');
	Route::post('/add', 'BannerController@add')->name('admin.banner.add');
	Route::get('/{banner}/detail', 'BannerController@detail')->name('admin.banner.detail');
	Route::post('/{banner}/update', 'BannerController@update')->name('admin.banner.update');
	Route::post('/delete', 'BannerController@delete')->name('admin.banner.delete');

});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


        // Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

//         // Password Reset Routes...
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Route::get('/home', 'HomeController@index')->name('home');
