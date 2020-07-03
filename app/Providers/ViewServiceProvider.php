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
        View::composer(['movements.fields'], function ($view) {
            $userItems = User::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['movements.fields'], function ($view) {
            $productItems = Product::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('productItems', $productItems);
        });
        View::composer(['movements.show_fields'], function ($view) {
            $userItems = User::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['movements.show_fields'], function ($view) {
            $productItems = Product::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('productItems', $productItems);
        });
        View::composer(['movements.table'], function ($view) {
            $userItems = User::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['movements.table'], function ($view) {
            $productItems = Product::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('productItems', $productItems);
        });
        View::composer(['tournaments.fields'], function ($view) {
            $leagueItems = League::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('leagueItems', $leagueItems);
        });
        View::composer(['tournaments.table'], function ($view) {
            $leagueItems = League::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('leagueItems', $leagueItems);
        });
        View::composer(['tournaments.show_fields'], function ($view) {
            $leagueItems = League::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('leagueItems', $leagueItems);
        });
        View::composer(['results.fields'], function ($view) {
            $matches = Match::all()->map->only('id', 'team_local_id', 'team_visitor_id', 'date_time');
            $matchItems=array();
            foreach ($matches as $key => $match) {
                $matchItems[$match['id']]= Team::find($match['team_local_id'])->name.' vs '.Team::find($match['team_visitor_id'])->name.' | '. date("d M y", strtotime($match['date_time'])) ;
            }
            $view->with('matchItems', $matchItems);
        });
        View::composer(['results.show_fields'], function ($view) {
            $matches = Match::all()->map->only('id', 'team_local_id', 'team_visitor_id', 'date_time');
            $matchItems=array();
            foreach ($matches as $key => $match) {
                $matchItems[$match['id']]= Team::find($match['team_local_id'])->name.' vs '.Team::find($match['team_visitor_id'])->name.' | '. date("d M y", strtotime($match['date_time'])) ;
            }
            $view->with('matchItems', $matchItems);
        });
        View::composer(['results.table'], function ($view) {
            $matches = Match::all()->map->only('id', 'team_local_id', 'team_visitor_id', 'date_time');
            $matchItems=array();
            foreach ($matches as $key => $match) {
                $matchItems[$match['id']]= Team::find($match['team_local_id'])->name.' vs '.Team::find($match['team_visitor_id'])->name.' | '. date("d M y", strtotime($match['date_time'])) ;
            }
            $view->with('matchItems', $matchItems);
        });
        View::composer(['accessories.fields'], function ($view) {
            $productItems = Product::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('productItems', $productItems);
        });
        View::composer(['accessories.fields'], function ($view) {
            $userItems = User::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['accessories.show_fields'], function ($view) {
            $productItems = Product::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('productItems', $productItems);
        });
        View::composer(['accessories.show_fields'], function ($view) {
            $userItems = User::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['accessories.table'], function ($view) {
            $productItems = Product::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('productItems', $productItems);
        });
        View::composer(['accessories.table'], function ($view) {
            $userItems = User::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['predictions.fields'], function ($view) {
            $matches = Match::all()->map->only('id', 'team_local_id', 'team_visitor_id', 'date_time');
            $matchItems=array();
            foreach ($matches as $key => $match) {
                $matchItems[$match['id']]= Team::find($match['team_local_id'])->name.' vs '.Team::find($match['team_visitor_id'])->name.' | '. date("d M y", strtotime($match['date_time'])) ;
            }
            $view->with('matchItems', $matchItems);
        });
        View::composer(['predictions.fields'], function ($view) {
            $userItems = User::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['predictions.fields'], function ($view) {
            $stateItems = State::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('stateItems', $stateItems);
        });
        View::composer(['predictions.show_fields'], function ($view) {
            $matches = Match::all()->map->only('id', 'team_local_id', 'team_visitor_id', 'date_time');
            $matchItems=array();
            foreach ($matches as $key => $match) {
                $matchItems[$match['id']]= Team::find($match['team_local_id'])->name.' vs '.Team::find($match['team_visitor_id'])->name.' | '. date("d M y", strtotime($match['date_time'])) ;
            }
            $view->with('matchItems', $matchItems);
        });
        View::composer(['predictions.show_fields'], function ($view) {
            $userItems = User::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['predictions.show_fields'], function ($view) {
            $stateItems = State::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('stateItems', $stateItems);
        });
        View::composer(['predictions.table'], function ($view) {
            $matches = Match::all()->map->only('id', 'team_local_id', 'team_visitor_id', 'date_time');
            $matchItems=array();
            foreach ($matches as $key => $match) {
                $matchItems[$match['id']]= Team::find($match['team_local_id'])->name.' vs '.Team::find($match['team_visitor_id'])->name.' | '. date("d M y", strtotime($match['date_time'])) ;
            }
            $view->with('matchItems', $matchItems);
        });
        View::composer(['predictions.table'], function ($view) {
            $userItems = User::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['predictions.table'], function ($view) {
            $stateItems = State::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('stateItems', $stateItems);
        });
        View::composer(['payments.fields'], function ($view) {
            $productItems = Product::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('productItems', $productItems);
        });
        View::composer(['payments.fields'], function ($view) {
            $userItems = User::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['payments.fields'], function ($view) {
            $stateItems = State::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('stateItems', $stateItems);
        });
        View::composer(['payments.fields'], function ($view) {
            $methodItems = Method::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('methodItems', $methodItems);
        });
        View::composer(['payments.show_fields'], function ($view) {
            $productItems = Product::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('productItems', $productItems);
        });
        View::composer(['payments.show_fields'], function ($view) {
            $userItems = User::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['payments.show_fields'], function ($view) {
            $stateItems = State::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('stateItems', $stateItems);
        });
        View::composer(['payments.show_fields'], function ($view) {
            $methodItems = Method::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('methodItems', $methodItems);
        });
        View::composer(['payments.table'], function ($view) {
            $productItems = Product::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('productItems', $productItems);
        });
        View::composer(['payments.table'], function ($view) {
            $userItems = User::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['payments.table'], function ($view) {
            $stateItems = State::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('stateItems', $stateItems);
        });
        View::composer(['payments.table'], function ($view) {
            $methodItems = Method::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('methodItems', $methodItems);
        });
        View::composer(['products.fields'], function ($view) {
            $categoryItems = Category::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('categoryItems', $categoryItems);
        });
        View::composer(['products.table'], function ($view) {
            $categoryItems = Category::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('categoryItems', $categoryItems);
        });
        View::composer(['products.show_fields'], function ($view) {
            $categoryItems = Category::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('categoryItems', $categoryItems);
        });
        View::composer(['matches.fields'], function ($view) {
            $roundItems = Round::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('roundItems', $roundItems);
        });
        View::composer(['matches.fields'], function ($view) {
            $teamItems = Team::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('teamItems', $teamItems);
        });
        View::composer(['matches.fields'], function ($view) {
            $stateItems = State::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('stateItems', $stateItems);
        });
        View::composer(['matches.table'], function ($view) {
            $roundItems = Round::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('roundItems', $roundItems);
        });
        View::composer(['matches.table'], function ($view) {
            $teamItems = Team::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('teamItems', $teamItems);
        });
        View::composer(['matches.table'], function ($view) {
            $stateItems = State::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('stateItems', $stateItems);
        });
        View::composer(['matches.show_fields'], function ($view) {
            $roundItems = Round::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('roundItems', $roundItems);
        });
        View::composer(['matches.show_fields'], function ($view) {
            $teamItems = Team::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('teamItems', $teamItems);
        });
        View::composer(['matches.show_fields'], function ($view) {
            $stateItems = State::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('stateItems', $stateItems);
        });
        View::composer(['teams.fields'], function ($view) {
            $leagueItems = League::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('leagueItems', $leagueItems);
        });
        View::composer(['teams.table'], function ($view) {
            $leagueItems = League::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('leagueItems', $leagueItems);
        });
        View::composer(['teams.show_fields'], function ($view) {
            $leagueItems = League::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('leagueItems', $leagueItems);
        });
        View::composer(['teams.fields'], function ($view) {
            $roundItems = Round::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('roundItems', $roundItems);
        });
        View::composer(['teams.table'], function ($view) {
            $roundItems = Round::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('roundItems', $roundItems);
        });
        View::composer(['teams.show_fields'], function ($view) {
            $roundItems = Round::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('roundItems', $roundItems);
        });
        View::composer(['rounds.fields'], function ($view) {
            $tournamentItems = Tournament::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('tournamentItems', $tournamentItems);
        });
        View::composer(['rounds.table'], function ($view) {
            $tournamentItems = Tournament::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('tournamentItems', $tournamentItems);
        });
        View::composer(['rounds.fields'], function ($view) {
            $leagueItems = League::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('leagueItems', $leagueItems);
        });
        View::composer(['rounds.show_fields'], function ($view) {
            $tournamentItems = Tournament::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('tournamentItems', $tournamentItems);
        });
        View::composer(['rounds.show_fields'], function ($view) {
            $leagueItems = League::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('leagueItems', $leagueItems);
        });
        View::composer(['rounds.table'], function ($view) {
            $leagueItems = League::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('leagueItems', $leagueItems);
        });
        View::composer(['users.fields'], function ($view) {
            $teamItems = Team::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('teamItems', $teamItems);
        });
        View::composer(['users.show_fields'], function ($view) {
            $teamItems = Team::where('enabled','1')->pluck('name','id')->toArray();
            $view->with('teamItems', $teamItems);
        });
        //
    }
}