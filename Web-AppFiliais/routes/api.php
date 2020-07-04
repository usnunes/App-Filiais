<?php

use Illuminate\Http\Request;

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




Route::post('auth/login', 'Api\\AuthController@login');
Route::post('auth/logout', 'Api\\AuthController@logout');

Route::group(['middleware' => ['apiJwt']], function () {
    Route::namespace('Api')->group(function(){
        //Route::get('filiais','FilialController@index')->name('filiais');
        Route::get('filial/{filial}','FilialController@show')->name('filial');

    });
});

Route::get('filiais','Api\\FilialController@index')->name('filiais');
//Route::get('filial/{filial}','Api\\FilialController@show')->name('filial');
