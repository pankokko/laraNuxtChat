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

//Route::get('/', function () {
//    return view('welcome');
//});

    Route::get('/nuxt/{path?}', 'NuxtController@nuxt')->where('path', '.*')->name('nuxt');
    Route::post('/nuxt/{path?}', 'NuxtController@nuxt')->where('path', '.*');
    // Laravel Top Page
    Route::get('/', 'IndexController@index')->name('index');
