<?php

namespace ShowTracker\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function index()
    {
        // On vérifie que l'utilisateur est déjà connecté ou non au site
        if(!isset($_SESSION['id'])){
            return view('propre');
          //return view('inscription', ['message' => 'Vous devez d\'abord vous connecter ou vous inscrire']);
        }
        $infoSeries = DB::table('series')->select('*')->orderBy('popularity', 'desc')->paginate(18);
        return view('home', ['infoSeries' => $infoSeries]);
    }

    /*
     * Methode qui permet de trier les séries en fonctions de mots clés
     */
    public function trierPar(){

        $clauseWhere = "";

        // On récupere les thèmes choisit pour le trie
        $themes = Input::get();

        // On vérifie que l'utilisateur a bien choisi au moins 1 thème
        if(!empty($themes)) {


            $path = URL::to('/').'/trier?';

            // On crée une chaine de caractère pour adapter la clause where de la requete
            foreach ($themes as $theme) {
                $clauseWhere .= "genres.name = '$theme' OR ";
                $path .= "$theme=$theme";
            }

            //On supprime le dernier 'OR'
            $clauseWhere = substr($clauseWhere, 0, strlen($clauseWhere) - 3);

            // On récupère le resultat de la requete
            /**$infoSeries = new Paginator(DB::select("SELECT *
                        from genres JOIN seriesgenres on genres.id = seriesgenres.genre_id
                        join series ON seriesgenres.series_id = series.id 
                        WHERE $clauseWhere"), 18);

            //$infoSeries->setPath($path);*/

            $infoSeries = DB::select("SELECT *
                        from genres JOIN seriesgenres on genres.id = seriesgenres.genre_id
                        join series ON seriesgenres.series_id = series.id 
                        WHERE $clauseWhere order by series.popularity");


            return view('home', ['infoSeries' => $infoSeries, 'pagination' => false]);
        }else{
            $infoSeries = DB::table('series')->select('*')->orderBy('popularity', 'desc')->paginate(18);
            return view('home', ['infoSeries' => $infoSeries]);
        }
    }
}
