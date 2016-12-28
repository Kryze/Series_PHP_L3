<html>
    <head>
        <title><?php echo $serie->name?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/siteCss.css') }}">
        <script src="{{ URL::asset('js/jquery-3.1.1.js') }}"></script>
        <script src="{{ URL::asset('js/home.js') }}"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!--<link href="'.$_SERVER['DOCUMENT_ROOT'].'/projetWebL3/css/siteCss.css" rel="stylesheet" type="text/css">-->
    </head>

@extends('layouts.app')

@section('content')
    <h1 id="titre2"></h1>
<div class="container">
    <div class="row">
            <!-- Formulaire de recherche -->
            <div>
                {!! Form::open(['method' => 'get', 'url' => 'recherche']) !!}
                    {!! Form::text('keywords', "", ['class' => 'searchBar']) !!}
                    {!! Form::submit('Rechercher') !!}
                {!! Form::close() !!}
            </div>

            <div class="center-block ficheblock">
                <?php
                    $url = \Illuminate\Support\Facades\URL::to('/');
					echo "<h1>$serie->name</h1> 
						  <img src='https://image.tmdb.org/t/p/w154$serie->poster_path'/> 
						  <p class=labelserie> Première diffusion : <span class=ficheserie>$serie->first_air_date </span> </p> 
						  <p class=labelserie> Dernière diffusion : <span class=ficheserie>$serie->last_air_date </span> </p>
						  <p class=labelserie> Nombre d'épisodes : <span class=ficheserie>$serie->number_of_episodes </span> </p>
						  <p class=labelserie> Nombre de saisons : <span class=ficheserie>$serie->number_of_seasons </span> </p>
						  <p class=labelserie> Résumé : <span class=ficheserie>$serie->overview</span>";
                ?>

                <p class=labelserie style="text-align:center"><a href="{{ url('home') }}">Retour à la liste des séries</a></p>
            </div>
    </div>
</div>
@endsection

<script>
</script>
</html>