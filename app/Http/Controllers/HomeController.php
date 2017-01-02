<?php

namespace ShowTracker\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
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
     *
     * On vérifie que l'utilisateur c'est deja connecté au site
     * Si oui la page principal est affiché sinon c'est la page d'acceuil pour les nouveaux utilisateurs
     */
    public function index()
    {
        if(!isset($_SESSION['id'])){
            return view('propre');
          //return view('inscription', ['message' => 'Vous devez d\'abord vous connecter ou vous inscrire']);
        }
        $infoSeries = DB::table('series')->select('*')->orderBy('popularity', 'desc')->paginate(18);
        return view('home', ['infoSeries' => $infoSeries]);
    }

    /*
     * 
     */
    public function trierPar(){

        $clauseWhere = "";

        $themes = Input::get();

        if(!empty($themes)) {
            foreach ($themes as $theme) {
                $clauseWhere .= "genres.name = '$theme' OR ";
            }

            $clauseWhere = substr($clauseWhere, 0, strlen($clauseWhere) - 3);

            $infoSeries = DB::select("SELECT *
                        from genres JOIN seriesgenres on genres.id = seriesgenres.genre_id
                        join series ON seriesgenres.series_id = series.id 
                        WHERE $clauseWhere");

            return view('home', ['infoSeries' => $infoSeries]);
        }else{
            $infoSeries = DB::table('series')->select('*')->orderBy('popularity', 'desc')->paginate(18);
            return view('home', ['infoSeries' => $infoSeries]);
        }
    }
}
