<?php
use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', 'StaticController@index')->name('home');
Route::get('/about', 'StaticController@about');
Route::get('/article/add', 'ArticlesController@create');
Route::post('/article/add', 'ArticlesController@store');
Route::get('/article/{id}','ArticlesController@show');
Route::delete('/article/{id}/delete', 'ArticlesController@destroy');
Route::get('/article/{id}/edit','ArticlesController@edit');
Route::put('/article/{id}/update','ArticlesController@update');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
