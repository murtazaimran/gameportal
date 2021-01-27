<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\Users\UserController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::post("loginApiUser",[UserController::class,'loginApi']); 

Route::post('loginApi', 'App\Http\Controllers\Users\UserController@loginApi')->name('loginApi');

Route::post('registerApi', 'App\Http\Controllers\Users\UserController@registerApi')->name('registerApi');

Route::group(['middleware' => ['auth:sanctum']], function() {
	Route::get('getUser', 'App\Http\Controllers\Users\UserController@getUser')->name('getUser');
});



Route::get('getMessageById/{game_id}', 'App\Http\Controllers\Messages\MessageController@getMessagesByGameId')->name('getMessageById');
