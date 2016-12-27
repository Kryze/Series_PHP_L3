<html>
    <head>
        <title>App Name - @yield('title')</title>
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
    <h1 id="titre2">Nos Séries</h1>
<div class="container">
    <div class="row">
            <!-- Formulaire de recherche -->
            <div>
                {!! Form::open(['method' => 'get', 'url' => 'recherche']) !!}
                    {!! Form::text('keywords', "", ['class' => 'searchBar']) !!}
                    {!! Form::submit('Rechercher') !!}
                {!! Form::close() !!}
            </div>

            <div class="center-block">
                <?php
                    $url = \Illuminate\Support\Facades\URL::to('/');

                    foreach ($infoSeries as $name){
                        echo "<div class='block serie $name->id')'>
                                    <a href='$url/fiche_serie.blade.php?num_serie=$name->id' ><img class='img-thumbnail' src='https://image.tmdb.org/t/p/w154$name->poster_path'/></a>
                              </div>";
                    }
                ?>

                <button style="display: block; width: 15%; margin: 15px auto;">Afficher plus + </button>
            </div>
    </div>
</div>
@endsection

<script>

</script>
</html>
