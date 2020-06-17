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


    Route::post('register', 'Auth\RegisterController@register');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout');


    Route::group(['middleware' => 'auth:api'], function() {
        Route::resource('states', 'API\StateAPIController');
    });











Route::resource('teams', 'TeamAPIController');

Route::resource('matches', 'MatchAPIController');







Route::resource('methods', 'MethodAPIController');

Route::resource('categories', 'CategoryAPIController');



Route::resource('products', 'ProductAPIController');





Route::resource('payments', 'PaymentAPIController');





Route::resource('predictions', 'PredictionAPIController');

Route::resource('accessories', 'AccessoryAPIController');





Route::resource('results', 'ResultAPIController');

Route::resource('movements', 'MovementAPIController');