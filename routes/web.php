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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
Route::resource('users', 'UserController')->middleware('auth');
Route::post('/updateEnabled', 'AjaxController@updateEnabled');









































Route::resource('states', 'StateController');

Route::resource('teams', 'TeamController');

Route::resource('matches', 'MatchController');







Route::resource('methods', 'MethodController');

Route::resource('categories', 'CategoryController');



Route::resource('products', 'ProductController');





Route::resource('payments', 'PaymentController');





Route::resource('predictions', 'PredictionController');

Route::resource('accessories', 'AccessoryController');





Route::resource('results', 'ResultController');

Route::resource('movements', 'MovementController');

Route::resource('rounds', 'RoundController');

Route::resource('leagues', 'LeagueController');

Route::resource('tournaments', 'TournamentController');