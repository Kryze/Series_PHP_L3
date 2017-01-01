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

    <div class='well' id='infos'>
         <p> Episodes Visionnées : </p>";
    foreach ($seasonsepisodes as $season) {
        $state = DB::table('seasons')->where('id',$season->season_id)->orderBy('seasons.number', 'asc')->get();
        foreach ($state as $s) {
            echo "<p>$s->name</p>";
        }
    }
    foreach ($userepisodes as $episode){
        echo "<p>$episode->episode_id</p>";
    }
    echo"
	</div>
</div>";
	?>
@endsection
