<?php

namespace ShowTracker\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class RecommandationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!isset($_SESSION['id'])){
          return view('inscription', ['message' => 'Vous devez d\'abord vous connecter ou vous inscrire']);
        }
        $infoSeries = DB::table('series')
                          ->join('seriesgenres', 'series.id', '=', 'seriesgenres.series_id')
                          ->join('genres', 'seriesgenres.genre_id', '=', 'genres.id')
                          ->whereIn('seriesgenres.genre_id', function($query)
                              {
                                  $query->select('genre_id')->distinct()
                                        ->from('seriesgenres')
                                        ->join('seriesseasons', 'seriesgenres.series_id', '=', 'seriesseasons.series_id')
                                        ->join('seasonsepisodes', 'seasonsepisodes.season_id', '=', 'seriesseasons.season_id')
                                        ->join('usersepisodes', 'seasonsepisodes.episode_id', '=', 'usersepisodes.episode_id')->get();
                              })
                          ->whereNotIn('seriesgenres.series_id', function($query)
                              {
                                  $query->select('seriesseasons.series_id')
                                        ->from('seriesseasons')
                                        ->join('seasonsepisodes', 'seasonsepisodes.season_id', '=', 'seriesseasons.season_id')
                                        ->join('usersepisodes', 'seasonsepisodes.episode_id', '=', 'usersepisodes.episode_id')->get();
                              })
                          ->distinct()->select('series.id', 'series.name', 'series.poster_path', 'series.popularity')->orderBy('popularity', 'desc')->get();
        $res = collect($infoSeries);
        $res = $res->random(18);
        return view('recommandation', ['infoSeries' => $res]);
    }
}
