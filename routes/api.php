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

//test route

/*Route::get('/language', function() {
    return response()->json([
        'language'=> ['inglese', 'italiano', 'francese']
    ]);
});*/


Route::namespace('Api')->group(function(){
    Route::get('/film','FilmController@index');
});
