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

Route::resource('users', 'UserController')->middleware('auth');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::resource('users', 'UserController')->middleware('auth');






Route::resource('leagues', 'LeagueController');

Route::resource('tournaments', 'TournamentController');







Route::resource('rounds', 'RoundController');























Route::resource('states', 'StateController');

Route::resource('teams', 'TeamController');

Route::resource('matches', 'MatchController');