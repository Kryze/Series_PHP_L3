<?php

namespace ShowTracker\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
class EpisodeController extends Controller
{

    public function __construct()
    {

    }

    public function episode()
    {
	$id = $_GET["num_serie"];
	$idserie = $_GET['id'];
	$state = DB::table('series')->where('id',$id)->first();
	$state2 = DB::table('episodes')->where('id',$idserie)->first();
	if(isset($_GET['non_vue'])) {
    DB::insert('insert into usersepisodes (user_id, episode_id,rating) values (?, ?, ?)', array($_SESSION["id"], $_GET['id'],'5'));
	return view('manipulerEpisode',['serie'=> $state,'episode'=> $state2]);
	}	

	if(isset($_GET['vue'])) {
    DB::delete('delete from usersepisodes where user_id='.$_SESSION["id"].' and episode_id='.$_GET['id']);
	return view('manipulerEpisode',['serie'=> $state,'episode'=> $state2]);
	}
	}
 }