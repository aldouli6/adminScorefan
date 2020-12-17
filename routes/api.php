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

Route::get('/logout', 'API\AuthController@logout');
Route::post('/register', 'API\AuthController@register');
Route::post('/login', 'API\AuthController@login');
Route::get('/teams', 'API\TeamAPIController@index');
Route::get('/root/{key}', 'API\FunctionsAPIController@root');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
// Route::middleware(['auth:api', 'root:root'])->group(function(){
Route::middleware(['root:root'])->group(function(){
    Route::resource('states', 'API\StateAPIController');
    // Route::resource('teams', 'API\TeamAPIController');
    Route::resource('rounds', 'API\RoundAPIController');
    Route::get('/actualRound', 'API\RoundAPIController@actualRound');
    Route::resource('leagues', 'API\LeagueAPIController');
    Route::resource('tournaments', 'API\TournamentAPIController');
    Route::resource('accessories', 'API\AccessoryAPIController');
    Route::post('/guardarPerfil', 'API\AccessoryAPIController@guardarPerfil');
    Route::post('/subirimagendata', ['as' => 'subirimagendata', 'uses' => 'API\AccessoryAPIController@uploadImage']);
    Route::get('/resumen/{user_id}', 'API\AccessoryAPIController@resumenPerfil');
    Route::get('/myAccesoriesFromCategory/{user_id}/{category_id}', 'API\AccessoryAPIController@myAccesoriesFromCategory');
    Route::resource('categories', 'API\CategoryAPIController');
    Route::resource('matches', 'API\MatchAPIController');
    Route::get('/roundMatches/{round_id}', 'API\MatchAPIController@roundMatches');
    Route::resource('results', 'API\ResultAPIController');
    Route::resource('methods', 'API\MethodAPIController');
    Route::resource('movements', 'API\MovementAPIController');
    Route::resource('payments', 'API\PaymentAPIController');
    Route::post('/guardarCompra', 'API\PaymentAPIController@guardarCompra');
    Route::resource('products', 'API\ProductAPIController');
    Route::resource('predictions', 'API\PredictionAPIController');
    Route::get('/roundPredictions/{round_id}/{user_id}', 'API\PredictionAPIController@roundPredictions');
    Route::get('/top3', 'API\FunctionsAPIController@getTop3');
    Route::get('/myRank/{user_id}', 'API\FunctionsAPIController@getMyRanking');
    Route::get('/rank', 'API\FunctionsAPIController@getRanking');
    Route::get('/tabla', 'API\FunctionsAPIController@getTablaGeneral');
});
