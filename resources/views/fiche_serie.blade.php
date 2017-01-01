

@extends('layouts.app2')
@section('title', 'Fiche Serie')
@section('content')
    <div class="col-lg-6">
        <div class="resume">
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
                <div class="center-block">
                  <h2>Par les mêmes réalisateurs : </h2>
                    <?php
                        $url = \Illuminate\Support\Facades\URL::to('/');
                        $infoSeries = DB::table('series')
                                          ->join('seriescreators', 'series.id', '=', 'seriescreators.series_id')
                                          ->whereIn('seriescreators.creator_id', function($query)
                                              {
                                                  $query->select('creator_id')->distinct()
                                                        ->from('seriescreators')
                                                        ->join('series', 'series.id', '=', 'seriescreators.series_id')
                                                        ->where('series.id', '=', $_GET["num_serie"])->get();
                                              })
                                          ->whereNotIn('seriescreators.series_id', function($query)
                                              {
                                                  $query->select('seriesseasons.series_id')
                                                        ->from('seriesseasons')
                                                        ->join('seasonsepisodes', 'seasonsepisodes.season_id', '=', 'seriesseasons.season_id')
                                                        ->join('usersepisodes', 'seasonsepisodes.episode_id', '=', 'usersepisodes.episode_id')->get();
                                              })
                                          ->where('series.id', '<>', $_GET['num_serie'])
                                          ->distinct()->select('series.id', 'series.name', 'series.poster_path', 'series.popularity')->orderBy('popularity', 'desc')->get();
              foreach ($infoSeries as $name){
                            echo "<div class='serie $name->id')'>
                                        <a href='$url/fiche_serie?num_serie=$name->id' ><img class='block' src='https://image.tmdb.org/t/p/w154$name->poster_path'/></a>
                      <p class=\"subname\"> $name->name </p>
                                  </div>";
                        }
                    ?>
                </div>
                <p class='labelserie' style="text-align:center"><a href="{{ url('home') }}">Retour à la liste des séries</a></p>
            </div>
        </div>
    </div>
        </div>
    <div class="separation col-lg-6">
    <div class="col-lg-4">
        <div class="resume">
        <h2 id="titre3">Saisons</h2>

        <?php
        $int = 0;
        $url = \Illuminate\Support\Facades\URL::to('/');
            foreach($sea as $r) {
                $nbEpi = 0;
                $statetest = DB::table('episodes')->join('seasonsepisodes', 'seasonsepisodes.episode_id', '=', 'episodes.id')->where('season_id',$r->id)->orderBy('episodes.number', 'asc')->get();
                foreach ($statetest as $episode){
                    $userepisode = DB::table('usersepisodes')->where('episode_id',$episode->id)->where('user_id',$_SESSION["id"])->count();
                    if($userepisode==1) {
                        $nbEpi = $nbEpi + 1;
                    }
                }
                if($nbEpi == $episode->number) {
                    echo "<input id='afficher$int' num='$int' class='btn btn-lg btn-default afficher Vu' style='width:100%' type='submit' name='connexion' value='Saison $r->number'>";
                }
                else {
                echo "<input id='afficher$int' num='$int' class='btn btn-lg btn-default afficher NoVu' style='width:100%' type='submit' name='connexion' value='Saison $r->number'>";
                    }
                $int = $int + 1;
            }
        ?>
            </div>
    </div>
    <div class="col-lg-8 separation">
        <h2 id="titre3">Episodes</h2>
        <?php
        $int = 0;
        $url = \Illuminate\Support\Facades\URL::to('/');
            foreach($sea as $r) {
                echo "<div id='invisible$int' class='invisible' >";
                $int = $int + 1;
				$statetest = DB::table('episodes')->join('seasonsepisodes', 'seasonsepisodes.episode_id', '=', 'episodes.id')->where('season_id',$r->id)->orderBy('episodes.number', 'asc')->get();
                //$state3 = DB::table('seasonsepisodes')->where('season_id',$r->id)->get();
                //foreach ($state3 as $numEpisode){
                //$state4 = DB::table('episodes')->where('id',$numEpisode->episode_id)->orderBy('number')->get();
                    foreach ($statetest as $episode){
                        $userepisode = DB::table('usersepisodes')->where('episode_id',$episode->id)->where('user_id',$_SESSION["id"])->count();
                        if ($userepisode==0) {
                            echo "<div class='well NoVu'>";
                        }
                        else {
                            echo "<div class='well Vu'>";
                        }
                        echo "
                            <h4>Episode $episode->number</h4>
                            <h5>$episode->name</h5>
                            <img class='miniimage' src='https://image.tmdb.org/t/p/w154$episode->still_path'/>
                            <p>$episode->overview</p>";
								echo Form::open(['method' => 'get', 'url' => 'episode']);
                                //<form method='get' action=''{{action('EpisodeController@episode')}}''>
                                  echo"<input class='hide' type='text' name='id' size='1' value='$episode->id' onFocus='this.blur()' maxlength='1'>";
								  echo"<input class='hide' type='text' name='num_serie' size='1' value='$serie->id' onFocus='this.blur()' maxlength='1'>";
                                    if ($userepisode==0) {
                                        echo "<input data-id='$episode->id' class='btn btn-group-sm btn-primary episode' style='width:100%' type='submit' name='non_vue' value='Non Vu'>";
                                    }
                                     else {
                                        echo "<input data-id='$episode->id' class='btn btn-group-sm btn-warning episode' style='width:100%' type='submit' name='vue' value='Vu'>";
                                    }
                                    echo Form::close();
                        echo "</div>";
                    }

                echo "</div>";
            }

        ?>
        </div>
        </div>
		<script></script>
@endsection

</html>
