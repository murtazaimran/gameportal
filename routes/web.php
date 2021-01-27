<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','App\Http\Controllers\Auth\LoginController@show_login_form');

Route::namespace('App\Http\Controllers\Auth')->group(function () {
  Route::get('/login','LoginController@show_login_form')->name('login');

  Route::post('login','LoginController@process_login')->name('login');
  // Route::get('register','LoginController@show_signup_form')->name('register');
  // Route::post('register','LoginController@process_signup');
  Route::post('logout','LoginController@logout')->name('logout');
});


//Route::get('/dashboard','App\Http\Controllers\Auth\LoginController@load_dashboard')->name('dashboard');

Route::get('/dashboard', 'App\Http\Controllers\Auth\LoginController@dashboard')->name('dashboard')->middleware('auth');

Route::get('/createUser', 'App\Http\Controllers\Users\UserController@createUserScreen')->name('createUser')->middleware('auth');
Route::post('/createUser', 'App\Http\Controllers\Users\UserController@processCreateUser')->name('createUser')->middleware('auth');

Route::get('/editUser/{id}', 'App\Http\Controllers\Users\UserController@createEditScreen')->name('editUser')->middleware('auth');
Route::post('/editUser/{id}', 'App\Http\Controllers\Users\UserController@processEditUser')->name('editUser')->middleware('auth');

Route::get('/deleteUser/{id}', 'App\Http\Controllers\Users\UserController@deleteUser')->name('deleteUser')->middleware('auth');

Route::get('/approveUser/{id}', 'App\Http\Controllers\Users\UserController@approveUser')->name('approveUser')->middleware('auth');



Route::get('/getUsers', 'App\Http\Controllers\Users\UserController@getAllUsers')->name('getUsers')->middleware('auth');



Route::get('/getGames', 'App\Http\Controllers\Games\GameController@getAllGames')->name('getGames')->middleware('auth');
Route::get('/getLogsDetails', 'App\Http\Controllers\Games\GameController@createGameChatLogsScreen')->name('getLogsDetails')->middleware('auth');



Route::get('/createGame', 'App\Http\Controllers\Games\GameController@createGameScreen')->name('createGame')->middleware('auth');
Route::post('/createGame', 'App\Http\Controllers\Games\GameController@processCreateGame')->name('createGame')->middleware('auth');


// Route::get('dashboard', function () {
//     // Only authenticated users may enter...
// })->middleware('auth');