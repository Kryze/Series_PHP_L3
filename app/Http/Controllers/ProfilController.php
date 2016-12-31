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

    public function profil()
    {
		if(isset($_SESSION["id"])){
			$id = $_SESSION["id"];
			$state = DB::table('users')->where('id',$id)->first();
            $state2 = DB::table('usersepisodes')->where('user_id',$id)->get();
			if(!empty($state) && !empty($state2)) {
                return view('profil', ['user'=> $state], ['userepisodes'=>$state2]);
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
