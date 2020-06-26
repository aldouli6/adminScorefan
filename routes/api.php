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

Route::get('/logout', 'Api\AuthController@logout');
Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');
Route::get('/teams', 'API\TeamAPIController@index');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::group(['middleware' => 'auth:api'], function() {
    Route::resource('states', 'API\StateAPIController');
    // Route::resource('teams', 'API\TeamAPIController');
    Route::resource('rounds', 'API\RoundAPIController');
    Route::resource('leagues', 'API\LeagueAPIController');
    Route::resource('tournaments', 'API\TournamentAPIController');
    Route::resource('accessories', 'API\AccessoryAPIController');
    Route::resource('categories', 'API\CategoryAPIController');
    Route::resource('matches', 'API\MatchAPIController');
    Route::resource('results', 'API\ResultAPIController');
    Route::resource('methods', 'API\MethodAPIController');
    Route::resource('movements', 'API\MovementAPIController');
    Route::resource('payments', 'API\PaymentAPIController');
    Route::resource('products', 'API\ProductAPIController');
    Route::resource('predictions', 'API\PredictionAPIController');
});