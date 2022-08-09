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
// home page
Route::get('/','App\Http\Controllers\WikiController@index')-> name('home'); 
// entry page
Route::get('/wiki/{title}','App\Http\Controllers\WikiController@entry')-> name('wiki'); 
// search
Route::post('wiki/search', [ App\Http\Controllers\WikiController::class, 'search' ])-> name('search'); 
// create
Route::get('/create','App\Http\Controllers\WikiController@create')-> name('create'); 
Route::post('/create','App\Http\Controllers\WikiController@createentry')-> name('create'); 
//edit
Route::get('/edit/{title}','App\Http\Controllers\WikiController@edit')-> name('edit'); 
Route::post('/editentry/{title}','App\Http\Controllers\WikiController@editEntry')-> name('editEntry'); 
// random
Route::get('/random','App\Http\Controllers\WikiController@random')-> name('random'); 

