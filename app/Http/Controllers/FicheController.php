<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class FicheController extends Controller
{
    public function __construct()
    {

    }

    public function fiche()
    {
		echo $_GET["num_serie"];
		if(isset($_GET["num_serie"])){
			$id = $_GET["num_serie"];
			$state = DB::table('series')->where('id',$id)->first();
            $state2 = DB::table('seriesseasons')->where('series_id',$id)->get();
			if(!empty($state) && !empty($state2)) {
                return view('fiche_serie', ['serie'=> $state], ['seriesseasons'=>$state2]);
			}
		}
		else{
			echo "Erreur";
		}

        /*$res = Input::get('keywords');


        if($res != "") {

            $keywords = explode(' ', $res);

            $like = "";
            foreach ($keywords as $keyword) {
                if (strlen($keyword) > 3)
                    $like .= " original_name LIKE '%" . $keyword . "%' OR";
            }
            $like = substr($like, 0, strlen($like) - 3);

            $req = "SELECT * FROM series WHERE " . $like . "limit 25";

            $state = DB::select($req);
            dump($state);
            if(!empty($state)) {
                return view('search', ['state' => $state]);
            }else{
                return "Aucun résultat";
            }
        }else{
            return "veuillez inscrire un kfjlds";*/
        }
 }
