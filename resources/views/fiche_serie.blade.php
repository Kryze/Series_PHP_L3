<html>
    <head>
        <title><?php echo $serie->name?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/siteCss.css') }}">
        <script src="{{ URL::asset('js/jquery-3.1.1.js') }}"></script>
        <script src="{{ URL::asset('js/home.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/SiteJs.js') }}"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!--<link href="'.$_SERVER['DOCUMENT_ROOT'].'/projetWebL3/css/siteCss.css" rel="stylesheet" type="text/css">-->
    </head>

@extends('layouts.app')

@section('content')
    <div class="col-lg-6 separation">
    <h1 id="titre3"><?php echo $serie->name?></h1>
    <div class="row">
            <div class="ficheblock">
                <?php
                    $url = \Illuminate\Support\Facades\URL::to('/');
					echo "
						  <img class='block2' src='https://image.tmdb.org/t/p/w154$serie->poster_path'/>
						  <div class='labelserie'>
						  <p> Première diffusion : <span class=ficheserie>$serie->first_air_date </span> </p>
						  <p> Dernière diffusion : <span class=ficheserie>$serie->last_air_date </span> </p>
						  <p> Nombre d'épisodes : <span class=ficheserie>$serie->number_of_episodes </span> </p>
						  <p> Nombre de saisons : <span class=ficheserie>$serie->number_of_seasons </span> </p>
						  <p> Résumé : <span class=ficheserie>$serie->overview</span>
						  </div>";
                ?>
                <p class='labelserie' style="text-align:center"><a href="{{ url('home') }}">Retour à la liste des séries</a></p>
            </div>
        </div>
    </div>
    <div class="col-lg-2 separation">
        <h2 id="titre3">Saisons</h2>

        <?php
        $url = \Illuminate\Support\Facades\URL::to('/');
        foreach ($seriesseasons as $season){
            $req = DB::table('seasons')->where('id',$season->season_id)->get();
            foreach($req as $r) {
                echo "<input id='afficher' class='btn btn-lg btn-default' style='width:100%' type='submit' name='connexion' value='Saison $r->number'>";
            }
        }
        ?>
    </div>
    <div class="col-lg-4 separation">
        <h2 id="titre3">Episodes</h2>
        <?php
        $url = \Illuminate\Support\Facades\URL::to('/');
        foreach ($seriesseasons as $season){
            $req = DB::table('seasons')->where('id',$season->season_id)->get();
            foreach($req as $r) {
                echo "<div id='invisible'>";
                $state3 = DB::table('seasonsepisodes')->where('season_id',$season->season_id)->orderBy('episode_id')->take(5)->get();
                foreach ($state3 as $numEpisode){
                    $state4 = DB::table('episodes')->where('id',$numEpisode->episode_id)->orderBy('number')->get();
                    foreach ($state4 as $episode){
                        echo "
                        <div class='well'>
                            <h4>Episode $episode->number</h4>
                            <h5>$episode->name</h5>
                            <img class='miniimage' src='https://image.tmdb.org/t/p/w154$episode->still_path'/>
                            <p>$episode->overview</p>
                        </div>";
                    }
                }
                echo "</div>";
            }
        }
        ?>
        </div>
@endsection

<script>
</script>
</html>