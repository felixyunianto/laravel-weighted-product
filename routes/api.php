<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('json-alternative', 'AlternativeController@jsonAllData');
Route::get('json-alternative/{id}', 'AlternativeController@jsonDataById');
Route::post('json-alternative', 'AlternativeController@storeJson');
Route::put('json-alternative/{id}', 'AlternativeController@updateJson');
Route::delete('json-alternative/{id}', 'AlternativeController@deleteJson');