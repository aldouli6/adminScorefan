<?php

namespace App\Providers;
use App\Models\Match;
use App\Models\Product;
use App\User;
use App\Models\Method;
use App\Models\Category;
use App\Models\Round;
use App\Models\Team;
use App\Models\State;
use App\Models\Tournament;
use App\Models\League;

use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['tournaments.fields'], function ($view) {
            $leagueItems = League::pluck('name','id')->toArray();
            $view->with('leagueItems', $leagueItems);
        });
        View::composer(['rounds.fields'], function ($view) {
            $tournamentItems = Tournament::pluck('name','id')->toArray();
            $view->with('tournamentItems', $tournamentItems);
        });
        View::composer(['rounds.fields'], function ($view) {
            $leagueItems = League::pluck('name','id')->toArray();
            $view->with('leagueItems', $leagueItems);
        });
        View::composer(['movements.fields'], function ($view) {
            $productItems = Product::pluck('name','id')->toArray();
            $view->with('productItems', $productItems);
        });
        View::composer(['results.fields'], function ($view) {
            $matchItems = Match::pluck('id','id')->toArray();
            $view->with('matchItems', $matchItems);
        });
        View::composer(['results.fields'], function ($view) {
            $matchItems = Match::pluck('id','id')->toArray();
            $view->with('matchItems', $matchItems);
        });
        View::composer(['results.fields'], function ($view) {
            $matchItems = Match::pluck('id','id')->toArray();
            $view->with('matchItems', $matchItems);
        });
        View::composer(['accessories.fields'], function ($view) {
            $productItems = Product::pluck('name','id')->toArray();
            $view->with('productItems', $productItems);
        });
        View::composer(['accessories.fields'], function ($view) {
            $userItems = User::pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['predictions.fields'], function ($view) {
            $matchItems = Match::pluck('id','id')->toArray();
            $view->with('matchItems', $matchItems);
        });
        View::composer(['predictions.fields'], function ($view) {
            $userItems = User::pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['predictions.fields'], function ($view) {
            $stateItems = State::pluck('name','id')->toArray();
            $view->with('stateItems', $stateItems);
        });
        View::composer(['predictions.fields'], function ($view) {
            $matchItems = Match::pluck('id','id')->toArray();
            $view->with('matchItems', $matchItems);
        });
        View::composer(['predictions.fields'], function ($view) {
            $userItems = User::pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['predictions.fields'], function ($view) {
            $stateItems = State::pluck('name','id')->toArray();
            $view->with('stateItems', $stateItems);
        });
        View::composer(['predictions.fields'], function ($view) {
            $matchItems = Match::pluck('id','id')->toArray();
            $view->with('matchItems', $matchItems);
        });
        View::composer(['predictions.fields'], function ($view) {
            $userItems = User::pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['predictions.fields'], function ($view) {
            $stateItems = State::pluck('name','id')->toArray();
            $view->with('stateItems', $stateItems);
        });
        View::composer(['payments.fields'], function ($view) {
            $productItems = Product::pluck('name','id')->toArray();
            $view->with('productItems', $productItems);
        });
        View::composer(['payments.fields'], function ($view) {
            $userItems = User::pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['payments.fields'], function ($view) {
            $stateItems = State::pluck('name','id')->toArray();
            $view->with('stateItems', $stateItems);
        });
        View::composer(['payments.fields'], function ($view) {
            $methodItems = Method::pluck('name','id')->toArray();
            $view->with('methodItems', $methodItems);
        });
        View::composer(['payments.fields'], function ($view) {
            $productItems = Product::pluck('name','id')->toArray();
            $view->with('productItems', $productItems);
        });
        View::composer(['payments.fields'], function ($view) {
            $userItems = User::pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['payments.fields'], function ($view) {
            $stateItems = State::pluck('name','id')->toArray();
            $view->with('stateItems', $stateItems);
        });
        View::composer(['payments.fields'], function ($view) {
            $methodItems = Method::pluck('name','id')->toArray();
            $view->with('methodItems', $methodItems);
        });
        View::composer(['payments.fields'], function ($view) {
            $productItems = Product::pluck('name','id')->toArray();
            $view->with('productItems', $productItems);
        });
        View::composer(['payments.fields'], function ($view) {
            $userItems = User::pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['payments.fields'], function ($view) {
            $stateItems = State::pluck('name','id')->toArray();
            $view->with('stateItems', $stateItems);
        });
        View::composer(['payments.fields'], function ($view) {
            $methodItems = Method::pluck('name','id')->toArray();
            $view->with('methodItems', $methodItems);
        });
        View::composer(['products.fields'], function ($view) {
            $categoryItems = Category::pluck('name','id')->toArray();
            $view->with('categoryItems', $categoryItems);
        });
        View::composer(['products.fields'], function ($view) {
            $categoryItems = Category::pluck('name','id')->toArray();
            $view->with('categoryItems', $categoryItems);
        });
        View::composer(['matches.fields'], function ($view) {
            $roundItems = Round::pluck('name','id')->toArray();
            $view->with('roundItems', $roundItems);
        });
        View::composer(['matches.fields'], function ($view) {
            $teamItems = Team::pluck('name','id')->toArray();
            $view->with('teamItems', $teamItems);
        });
        View::composer(['matches.fields'], function ($view) {
            $teamItems = Team::pluck('name','id')->toArray();
            $view->with('teamItems', $teamItems);
        });
        View::composer(['matches.fields'], function ($view) {
            $stateItems = State::pluck('name','id')->toArray();
            $view->with('stateItems', $stateItems);
        });
        View::composer(['teams.fields'], function ($view) {
            $leagueItems = League::pluck('name','id')->toArray();
            $view->with('leagueItems', $leagueItems);
        });
        View::composer(['teams.fields'], function ($view) {
            $leagueItems = League::pluck('name','id')->toArray();
            $view->with('leagueItems', $leagueItems);
        });
        View::composer(['matches.fields'], function ($view) {
            $roundItems = Round::pluck('name','id')->toArray();
            $view->with('roundItems', $roundItems);
        });
        View::composer(['matches.fields'], function ($view) {
            $teamItems = Team::pluck('name','id')->toArray();
            $view->with('teamItems', $teamItems);
        });
        View::composer(['matches.fields'], function ($view) {
            $teamItems = Team::pluck('name','id')->toArray();
            $view->with('teamItems', $teamItems);
        });
        View::composer(['matches.fields'], function ($view) {
            $stateItems = State::pluck('name','id')->toArray();
            $view->with('stateItems', $stateItems);
        });
        View::composer(['matches.fields'], function ($view) {
            $roundItems = Round::pluck('name','id')->toArray();
            $view->with('roundItems', $roundItems);
        });
        View::composer(['matches.fields'], function ($view) {
            $teamItems = Team::pluck('name','id')->toArray();
            $view->with('teamItems', $teamItems);
        });
        View::composer(['matches.fields'], function ($view) {
            $teamItems = Team::pluck('name','id')->toArray();
            $view->with('teamItems', $teamItems);
        });
        View::composer(['matches.fields'], function ($view) {
            $stateItems = State::pluck('name','id')->toArray();
            $view->with('stateItems', $stateItems);
        });
        View::composer(['matches.fields'], function ($view) {
            $roundItems = Round::pluck('name','id')->toArray();
            $view->with('roundItems', $roundItems);
        });
        View::composer(['matches.fields'], function ($view) {
            $teamItems = Team::pluck('name','id')->toArray();
            $view->with('teamItems', $teamItems);
        });
        View::composer(['matches.fields'], function ($view) {
            $teamItems = Team::pluck('name','id')->toArray();
            $view->with('teamItems', $teamItems);
        });
        View::composer(['matches.fields'], function ($view) {
            $stateItems = State::pluck('name','id')->toArray();
            $view->with('stateItems', $stateItems);
        });
        View::composer(['teams.fields'], function ($view) {
            $leagueItems = League::pluck('name','id')->toArray();
            $view->with('leagueItems', $leagueItems);
        });
        View::composer(['teams.fields'], function ($view) {
            $leagueItems = League::pluck('name','id')->toArray();
            $view->with('leagueItems', $leagueItems);
        });
        View::composer(['rounds.fields'], function ($view) {
            $tournamentItems = Tournament::pluck('name','id')->toArray();
            $view->with('tournamentItems', $tournamentItems);
        });
        View::composer(['rounds.fields'], function ($view) {
            $leagueItems = League::pluck('name','id')->toArray();
            $view->with('leagueItems', $leagueItems);
        });
        View::composer(['rounds.fields'], function ($view) {
            $tournamentItems = Tournament::pluck('name','id')->toArray();
            $view->with('tournamentItems', $tournamentItems);
        });
        View::composer(['rounds.fields'], function ($view) {
            $leagueItems = League::pluck('name','id')->toArray();
            $view->with('leagueItems', $leagueItems);
        });
        View::composer(['rounds.fields'], function ($view) {
            $tournamentItems = Tournament::pluck('name','id')->toArray();
            $view->with('tournamentItems', $tournamentItems);
        });
        View::composer(['rounds.fields'], function ($view) {
            $leagueItems = League::pluck('name','id')->toArray();
            $view->with('leagueItems', $leagueItems);
        });
        View::composer(['rounds.fields'], function ($view) {
            $tournamentItems = Tournament::pluck('name','id')->toArray();
            $view->with('tournamentItems', $tournamentItems);
        });
        View::composer(['rounds.fields'], function ($view) {
            $leagueItems = League::pluck('name','id')->toArray();
            $view->with('leagueItems', $leagueItems);
        });
        View::composer(['tournaments.fields'], function ($view) {
            $leagueItems = League::pluck('name','id')->toArray();
            $view->with('leagueItems', $leagueItems);
        });
        //
    }
}