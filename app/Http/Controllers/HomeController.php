<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     */
    public function index()
    {
        if(!isset($_SESSION['id'])){
          return view('inscription', ['message' => 'Vous devez d\'abord vous connecter ou vous inscrire']);
        }
        $infoSeries = DB::table('series')->select('*')->orderBy('popularity', 'desc')->paginate(18);
        return view('home', ['infoSeries' => $infoSeries]);
    }
}
