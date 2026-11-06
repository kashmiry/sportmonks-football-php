<?php

declare(strict_types=1);

namespace Kash\Sportmonks\Football;

use Kash\Sportmonks\Football\Endpoint\Bookmakers;
use Kash\Sportmonks\Football\Endpoint\Cities;
use Kash\Sportmonks\Football\Endpoint\Coaches;
use Kash\Sportmonks\Football\Endpoint\Commentaries;
use Kash\Sportmonks\Football\Endpoint\Continents;
use Kash\Sportmonks\Football\Endpoint\Countries;
use Kash\Sportmonks\Football\Endpoint\Filters;
use Kash\Sportmonks\Football\Endpoint\Fixtures;
use Kash\Sportmonks\Football\Endpoint\InplayOdds;
use Kash\Sportmonks\Football\Endpoint\Leagues;
use Kash\Sportmonks\Football\Endpoint\Livescores;
use Kash\Sportmonks\Football\Endpoint\Markets;
use Kash\Sportmonks\Football\Endpoint\My;
use Kash\Sportmonks\Football\Endpoint\Players;
use Kash\Sportmonks\Football\Endpoint\Predictions;
use Kash\Sportmonks\Football\Endpoint\PreMatchNews;
use Kash\Sportmonks\Football\Endpoint\PreMatchOdds;
use Kash\Sportmonks\Football\Endpoint\Referees;
use Kash\Sportmonks\Football\Endpoint\Regions;
use Kash\Sportmonks\Football\Endpoint\Rivals;
use Kash\Sportmonks\Football\Endpoint\Rounds;
use Kash\Sportmonks\Football\Endpoint\Schedules;
use Kash\Sportmonks\Football\Endpoint\Seasons;
use Kash\Sportmonks\Football\Endpoint\Stages;
use Kash\Sportmonks\Football\Endpoint\Standings;
use Kash\Sportmonks\Football\Endpoint\States;
use Kash\Sportmonks\Football\Endpoint\Teams;
use Kash\Sportmonks\Football\Endpoint\TeamSquads;
use Kash\Sportmonks\Football\Endpoint\Topscorers;
use Kash\Sportmonks\Football\Endpoint\Transfers;
use Kash\Sportmonks\Football\Endpoint\TvStations;
use Kash\Sportmonks\Football\Endpoint\Types;
use Kash\Sportmonks\Football\Endpoint\Venues;

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
