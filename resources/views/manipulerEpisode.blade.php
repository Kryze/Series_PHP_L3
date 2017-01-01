@extends('layouts.app')
@section('title', 'Episode mis a jour')
@section('content')

<?php
$url = \Illuminate\Support\Facades\URL::to('/');



echo "<p> Episode mis à jour </p>
	  <div id=center> 
	  <h1 id=\"titre3\">Votre episode \"$episode->name\" de $serie->name a été mis à jour</h1>
	  <img class='block2' src='https://image.tmdb.org/t/p/w154$serie->poster_path'/>
	  </div>
	  <p class='labelretour'><a class='labelretour' href='$url/fiche_serie?num_serie=$serie->id' >Retour à $serie->name</a></p>";
	  
?>
	  <p class='labelretour'><a class='labelretour' href="{{ url('home') }}">Retour à la liste des séries</a></p>
	  
