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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource("/rol","App\Http\Controllers\RolController");
Route::post("/signon","App\Http\Controllers\UsuarioController@signon");
Route::post("/signin","App\Http\Controllers\UsuarioController@signin");
Route::resource("/user","App\Http\Controllers\UsuarioController");
