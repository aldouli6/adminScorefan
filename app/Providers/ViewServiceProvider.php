<?php

namespace App\Providers;
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