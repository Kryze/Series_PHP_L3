@extends('layouts.app')
@section('title', 'Profil')
@section('content')
	<?php
	 echo "
<div class='well saut_ligne'>
    <h2 id='profil'>Profil</h2>

    <div class='well' id='infos'>
          <h4><B>Nom :</B> $user->name</>
		  <h4><B>Email :</B> $user->email</div>
	</div>
</div>

<div class='well saut_ligne2'>
    <h2 id='profil2'>Série(s) regardée(s)</h2>

    <div class='well' id='infos'>";
    $idancien = 0;
    $idsaisonancien = 999;
    $nbEpisode = 0;
    foreach ($seasonsepisodes as $season) {
        $state = DB::table('seasons')->join('seriesseasons','seasons.id','=','seriesseasons.season_id')->where('id',$season->season_id)->orderBy('seasons.number', 'asc')->get();
        foreach ($state as $s) {
            $state3 = DB::table('series')->where('id',$s->series_id)->orderBy('series.name', 'asc')->get();
            foreach ($state3 as $series) {
                if($idancien != $series->id) {
                    if($idancien != 0) {
                        echo "<p class='texte'>$nbEpisode épisode(s) vue(s)</p>";
                        echo "</div>";
                        $nbEpisode=0;
                    }
                    $idsaisonancien = 999;
                    echo "<div class='overflow col-lg-4'>";
                    echo "<h4>$series->name</h4>
                    <img class='block3' src='https://image.tmdb.org/t/p/w154$series->poster_path'/>";
                }
                $state4 = DB::table('episodes')->where('id',$season->episode_id)->orderBy('episodes.number', 'asc')->get();
                foreach ($state4 as $episode) {
                    if($idsaisonancien != $s->number) {
                        if($nbEpisode!=0) {
                            echo "<p class='texte'>$nbEpisode épisode(s) vue(s)</p>";
                        }
                        $nbEpisode = 0;
                        echo "<p class='texte'>Saison $s->number</p>";
                        $idsaisonancien = $s->number;
                    }
                    $nbEpisode = $nbEpisode + 1;
                }
            }
                $idancien = $series->id;
        }
    }
    echo "<p class='texte'>$nbEpisode épisode(s) vue(s)</p>";
    echo"
	</div>
</div>";
	?>
@endsection
