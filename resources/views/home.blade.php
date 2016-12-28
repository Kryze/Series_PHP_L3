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
                        echo "<div class='serie $name->id')'>
                                    <a href='$url/fiche_serie?num_serie=$name->id' ><img class='block' src='https://image.tmdb.org/t/p/w154$name->poster_path'/></a>
                              </div>";
                    }
                ?>
                <button style="display: block; width: 15%; margin: 15px auto;">Afficher plus + </button>
            </div>
    </div>
</div>
@endsection
