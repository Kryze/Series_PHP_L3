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

    public function index()
    {
        $res = Input::get('keywords');

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
    }

}

