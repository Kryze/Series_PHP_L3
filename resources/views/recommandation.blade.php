@extends('layouts.app2')
@section('title', 'Recommandation')
@section('content')
    <h1 id="titre2">Nous vous recommandons</h1>
<div class="container">
    <div class="row">
            <div class="center-block">
                <?php
                    $url = \Illuminate\Support\Facades\URL::to('/');
					foreach ($infoSeries as $name){
                        echo "<div class='serie $name->id')'>
                                    <a href='$url/fiche_serie?num_serie=$name->id' ><img class='block' src='https://image.tmdb.org/t/p/w154$name->poster_path'/></a>
									<p class=\"subname\"> $name->name </p>
                              </div>";
                    }
                ?>
            </div>
    </div>
</div>
@endsection
