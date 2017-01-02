<?php

namespace ShowTracker\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    public function __construct()
    {

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     *
     * Méthode qui permet de trouver des séries avec un nom similaire a celui indiqué
     *
     */
    public function index()
    {
        // On récupère les mots clés de l'utilisateur
        $res = Input::get('keywords');

        // On vérifie que l'utilisateur a mit au moins 1 mot
        if($res != "") {

            // On crée un tableau de mots clés
            $keywords = explode(' ', $res);

            $like = "";
            // Pour chaque mots clés on adapte la clause WHERE de la requete
            foreach ($keywords as $keyword) {
                if (strlen($keyword) > 3)
                    $like .= " original_name LIKE '%" . $keyword . "%' OR";
            }
            //On supprimer le dernier OR
            if(!empty($like)) {
                $like = substr($like, 0, strlen($like) - 3);

                $req = "SELECT * FROM series WHERE " . $like . "limit 25";


                $state = DB::select($req);
                // On vérifie si le resultat de la requete est vide ou non
                if (!empty($state)) {
                    return view('search', ['state' => $state, 'terme' => $res]);
                } else {
                    $infoSeries = DB::table('series')->select('*')->orderBy('popularity', 'desc')->paginate(18);
                    return view('home', ['res' => "Pas de résultat", 'infoSeries' => $infoSeries]);
                }
            }else{
                $infoSeries = DB::table('series')->select('*')->orderBy('popularity', 'desc')->paginate(18);
                return view('home', ['res' => "Mot clé non valide", 'infoSeries' => $infoSeries]);
            }
        }else{
            $infoSeries = DB::table('series')->select('*')->orderBy('popularity', 'desc')->paginate(18);
            return view('home', ['res' => "Vous n'avez pas inscrit de mot clé", 'infoSeries' => $infoSeries]);
        }
    }

}

/*
 * $res = Input::get('keywords');

        if($res != "") {

            $keywords = explode(' ', $res);

            $like = "";
            foreach ($keywords as $keyword) {
                if (strlen($keyword) > 2){
                    $like .= " original_name LIKE '%" . $keyword . "%' OR";

            $like = substr($like, 0, strlen($like) - 3);

            $req = "SELECT * FROM series WHERE " . $like . "limit 25";

            $state = DB::select($req);
            if(!empty($state)) {
                return view('search', ['state' => $state , 'terme' => $res]);
            }else{
                return "Aucun résultat";
            }
			}
			else{
				return redirect()->action('HomeController@index');
			}
			}
			}
        else{
            return redirect()->action('HomeController@index');
        }
 */

