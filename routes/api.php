<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::post('post_informasi', 'API\PertanyaanController@createInformasi');
Route::post('post_keberatan', 'API\PertanyaanController@createKeberatan');
Route::post('post_pungli', 'API\PertanyaanController@createPungli');
Route::post('post_wewenang', 'API\PertanyaanController@createWewenang');
Route::post('post_sengketa', 'API\PertanyaanController@createSengketa');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
