

@extends('layouts.app')
@section('title', 'Fiche Serie')
@section('content')
	<div class=separation>
    <div class="col-lg-6 separation">
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
                <p class='labelserie' style="text-align:center"><a href="{{ url('home') }}">Retour à la liste des séries</a></p>
            </div>
        </div>
    </div>
        </div>
    <div class="col-lg-2 separation">
        <div class="resume">
        <h2 id="titre3">Saisons</h2>

        <?php
        $int = 0;
        $url = \Illuminate\Support\Facades\URL::to('/');
            foreach($sea as $r) {
                echo "<input id='afficher$int' num='$int' class='btn btn-lg btn-default afficher' style='width:100%' type='submit' name='connexion' value='Saison $r->number'>";
                $int = $int + 1;
            }
        ?>
            </div>
    </div>
    <div class="col-lg-4 separation">
        <h2 id="titre3">Episodes</h2>
        <?php
        $int = 0;
        $url = \Illuminate\Support\Facades\URL::to('/');
            foreach($sea as $r) {
                echo "<div id='invisible$int' class='invisible' >";
                $int = $int + 1;
				$statetest = DB::table('episodes')->join('seasonsepisodes', 'seasonsepisodes.episode_id', '=', 'episodes.id')->where('season_id',$r->id)->orderBy('episodes.number', 'asc')->get();
                $state3 = DB::table('seasonsepisodes')->where('season_id',$r->id)->get();
                foreach ($state3 as $numEpisode){
                $state4 = DB::table('episodes')->where('id',$numEpisode->episode_id)->orderBy('number')->get();
                    foreach ($statetest as $episode){
                        echo "
                        <div class='well'>
                            <h4>Episode $episode->number</h4>
                            <h5>$episode->name</h5>
                            <img class='miniimage' src='https://image.tmdb.org/t/p/w154$episode->still_path'/>
                            <p>$episode->overview</p>
                            <input data-id='$episode->id' class='btn btn-group-sm btn-warning episode' style='width:100%' type='submit' name='connexion' value='Non vue'>
                        </div>";
                    }
                
                echo "</div>";
                }
            }
        ?>
        </div>
		</div>
		<script> document.getElementById('image_Ecran').style.background = "url('img/back.jpg') center no-repeat fixed"
				 document.getElementById('image_Ecran').style.backgroundSize = "cover"</script>
@endsection

</html>
