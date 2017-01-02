<?php

namespace ShowTracker\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class FicheController extends Controller
{
    public function __construct()
    {

    }
	/*
	* Cette fonction permet d'afficher les informations de la page fiche serie
	*/
    public function fiche()
    {
		echo $_GET["num_serie"];
		if(isset($_GET["num_serie"])){
			$id = $_GET["num_serie"];
			$state = DB::table('series')->where('id',$id)->first();
            $state2 = DB::table('seasons')->join('seriesseasons', 'seriesseasons.season_id', '=', 'seasons.id')->where('series_id',$id)->orderBy('seasons.number', 'asc')->get();
			if(!empty($state) && !empty($state2)) {
                return view('fiche_serie', ['serie'=> $state], ['sea'=>$state2]);
			}
			else{
				$infoSeries = DB::table('series')->select('*')->orderBy('popularity', 'desc')->paginate(18);
				return view('home', ['res' => "Pas de résultat", 'infoSeries' => $infoSeries]);
			}
		}
		else{
			$infoSeries = DB::table('series')->select('*')->orderBy('popularity', 'desc')->paginate(18);
            return view('home', ['res' => "Pas de résultat", 'infoSeries' => $infoSeries]);
		}

        }
 }
