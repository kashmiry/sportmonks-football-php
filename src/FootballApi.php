<?php

declare(strict_types=1);

namespace Sportmonks\Football;

use Sportmonks\Football\Endpoint\Bookmakers;
use Sportmonks\Football\Endpoint\Cities;
use Sportmonks\Football\Endpoint\Coaches;
use Sportmonks\Football\Endpoint\Commentaries;
use Sportmonks\Football\Endpoint\Continents;
use Sportmonks\Football\Endpoint\Countries;
use Sportmonks\Football\Endpoint\Filters;
use Sportmonks\Football\Endpoint\Fixtures;
use Sportmonks\Football\Endpoint\InplayOdds;
use Sportmonks\Football\Endpoint\Leagues;
use Sportmonks\Football\Endpoint\Livescores;
use Sportmonks\Football\Endpoint\Markets;
use Sportmonks\Football\Endpoint\My;
use Sportmonks\Football\Endpoint\Players;
use Sportmonks\Football\Endpoint\Predictions;
use Sportmonks\Football\Endpoint\PreMatchNews;
use Sportmonks\Football\Endpoint\PreMatchOdds;
use Sportmonks\Football\Endpoint\Referees;
use Sportmonks\Football\Endpoint\Regions;
use Sportmonks\Football\Endpoint\Rivals;
use Sportmonks\Football\Endpoint\Rounds;
use Sportmonks\Football\Endpoint\Schedules;
use Sportmonks\Football\Endpoint\Seasons;
use Sportmonks\Football\Endpoint\Stages;
use Sportmonks\Football\Endpoint\Standings;
use Sportmonks\Football\Endpoint\States;
use Sportmonks\Football\Endpoint\Teams;
use Sportmonks\Football\Endpoint\TeamSquads;
use Sportmonks\Football\Endpoint\Topscorers;
use Sportmonks\Football\Endpoint\Transfers;
use Sportmonks\Football\Endpoint\TvStations;
use Sportmonks\Football\Endpoint\Types;
use Sportmonks\Football\Endpoint\Venues;

class FootballApi
{
    public static function bookmakers(): Bookmakers
    {
        return new Bookmakers();
    }

    public static function coaches(): Coaches
    {
        return new Coaches();
    }

    public static function commentaries(): Commentaries
    {
        return new Commentaries();
    }

    public static function fixtures(): Fixtures
    {
        return new Fixtures();
    }

    public static function leagues(): Leagues
    {
        return new Leagues();
    }

    public static function livescores(): Livescores
    {
        return new Livescores();
    }

    public static function markets(): Markets
    {
        return new Markets();
    }

    public static function preMatchNews(): PreMatchNews
    {
        return new PreMatchNews();
    }

    public static function inplayOdds(): InplayOdds
    {
        return new InplayOdds();
    }

    public static function preMatchOdds(): PreMatchOdds
    {
        return new PreMatchOdds();
    }

    public static function players(): Players
    {
        return new Players();
    }

    public static function predictions(): Predictions
    {
        return new Predictions();
    }

    public static function referees(): Referees
    {
        return new Referees();
    }

    public static function rivals(): Rivals
    {
        return new Rivals();
    }

    public static function rounds(): Rounds
    {
        return new Rounds();
    }

    public static function schedules(): Schedules
    {
        return new Schedules();
    }

    public static function seasons(): Seasons
    {
        return new Seasons();
    }

    public static function stages(): Stages
    {
        return new Stages();
    }

    public static function states(): States
    {
        return new States();
    }

    public static function standings(): Standings
    {
        return new Standings();
    }

    public static function teamSquads(): TeamSquads
    {
        return new TeamSquads();
    }

    public static function teams(): Teams
    {
        return new Teams();
    }

    public static function topScorers(): Topscorers
    {
        return new Topscorers();
    }

    public static function transfers(): Transfers
    {
        return new Transfers();
    }


    public static function tvStations(): TvStations
    {
        return new TvStations();
    }

    public static function types(): Types
    {
        return new Types();
    }

    public static function venues(): Venues
    {
        return new Venues();
    }

    public static function continents(): Continents
    {
        return new Continents();
    }

    public static function countries(): Countries
    {
        return new Countries();
    }

    public static function regions(): Regions
    {
        return new Regions();
    }

    public static function cities(): Cities
    {
        return new Cities();
    }

    public static function filters(): Filters
    {
        return new Filters();
    }

    public static function my(): My
    {
        return new My();
    }
}
