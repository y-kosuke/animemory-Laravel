<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::get('/users/{user:id}', 'App\Http\Controllers\UserController@index');
Route::get('/users', 'App\Http\Controllers\UserController@index');
Route::post('/users', 'App\Http\Controllers\UserController@store');
Route::put('/users/{user:id}', 'App\Http\Controllers\UserController@update');
Route::delete('/users/{user:id}', 'App\Http\Controller\UserController@delete');
Route::get('/albums', 'App\Http\Controllers\AlbumController@index');
Route::post('/albums', 'App\Http\Controllers\AlbumController@store');
Route::put('/albums/{album:id}', 'App\Http\Controllers\AlbumController@update');
Route::delete('/albums/{album:id}', 'App\Http\Controller\AlbumController@delete');
Route::get('/photos', 'App\Http\Controllers\PhotoController@index');
Route::post('/photos', 'App\Http\Controllers\PhotoController@store');
Route::put('/photos/{photo:id}', 'App\Http\Controllers\PhotoController@update');
Route::delete('/photos/{photo:id}', 'App\Http\Controller\PhotoController@delete');


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
