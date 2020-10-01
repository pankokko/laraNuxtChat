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
