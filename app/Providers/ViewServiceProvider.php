<?php

namespace App\Providers;
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