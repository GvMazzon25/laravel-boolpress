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

//Rotte autenticazione
Auth::routes();


//Rotte amministrazione
Route::middleware('auth')
     ->namespace('Admin')
     ->name('admin.')
     ->prefix('admin')
     ->group(function() {
         //Admin Homepage
         Route::get('/', 'HomeController@index')->name('home');

         //Post resource routes
         Route::resource('/film', 'FilmController');
     });


Route::get('{any?}', function () {
    return view('guests.home');
})->where('any','.*');










