<?php

use App\Http\Controllers\HelloController;
use App\Http\Middleware\HelloMiddleware;
use Illuminate\Support\Facades\Route;
//use  App\Http\Middleware\HelloMiddlewere;

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

Route::get('/', function () {
  return view('welcome');
});


Route::get('hello', 'HelloController@index')
  ->middleware(HelloMiddleware::class);

Route::post('hello', 'HelloController@post');


//Route::get('hello','HelloController@index');
//Route::get('hello', [HelloController::class,'index']);

//Route::get('/hello/{id?}/{pass?}', 'App\Http\Controllers\HelloController@index');

//Route::get('/hello', 'App\Http\Controllers\HelloController');
//Route::get('/hello/other', 'App\Http\Controllers\HelloController@index');
