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
Route::get("/get", "Api\RestController@get")->name("get");
Route::post("/add", "Api\RestController@add")->name("add");
Route::put("/edit", "Api\RestController@edit")->name("edit");
Route::delete("/remove", "Api\RestController@remove")->name("remove");

    Route::group([
        'prefix' => 'auth'
    ], function () {
        Route::post('login', 'AuthController@login');
    });
    Route::prefix('auth')->middleware('auth:api')->group(function () {
        Route::post('logout', 'AuthController@logout');
        Route::get('current_user', function() {
           return Auth::user();
        });
        Route::post('save', "AuthController@save");
        Route::get('me', 'AuthController@me');
    });

    Route::namespace('Api\Chat')->prefix('chat')->group(function (){
       Route::post('save', 'ChatController@store')->name('send_message');
    });
