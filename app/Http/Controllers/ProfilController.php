<?php

namespace ShowTracker\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ProfilController extends Controller
{
    public function __construct()
    {

    }

	/**
	* Cette fonction permet d'afficher les informations du profil utilisateur
	*/
    public function profil()
    {
		if(isset($_SESSION["id"])){
			$id = $_SESSION["id"];
			$state = DB::table('users')->where('id',$id)->first();
            $state2 = DB::table('usersepisodes')->where('user_id',$id)->get();
            $state3 = DB::table('seasonsepisodes')->join('usersepisodes', 'usersepisodes.episode_id', '=', 'seasonsepisodes.episode_id')
                ->join('seriesseasons','seriesseasons.season_id','=','seasonsepisodes.season_id')
                ->join('series','series.id','=','seriesseasons.series_id')
                ->where('user_id',$id)->orderBy('series.name', 'asc')->get();
			if(!empty($state) && !empty($state2) && !empty($state3)) {
                return view('profil', ['user'=> $state, 'userepisodes'=>$state2, 'seasonsepisodes'=>$state3]);
			}
		}
		else{
			echo "Erreur";
		}

        }
 }
