@extends('layouts.app')
@section('title', 'Catalogue')
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

            <div class="trierPar">
                {!! Form::open(['url' => 'trier', 'method' => 'get']) !!}
                    {!! Form::label('Adventure') !!}
                    {!! Form::checkbox('Adventure', 'Adventure') !!}
                    {!! Form::label('Fantasy') !!}
                    {!! Form::checkbox('Fantasy', 'Fantasy') !!}
                    {!! Form::label('Animation') !!}
                    {!! Form::checkbox('Animation', 'Animation') !!}
                    {!! Form::label('Drama') !!}
                    {!! Form::checkbox('Drama', 'Drama') !!}
                    {!! Form::label('Horror') !!}
                    {!! Form::checkbox('Horror', 'Horror') !!}
                    {!! Form::label('Action') !!}
                    {!! Form::checkbox('Action', 'Action') !!}
                    {!! Form::label('Comedy') !!}
                    {!! Form::checkbox('Comedy', 'Comedy') !!}
                    {!! Form::label('History') !!}
                    {!! Form::checkbox('History', 'History') !!}
                    {!! Form::label('Western') !!}
                    {!! Form::checkbox('Western', 'Western') !!}
                    {!! Form::label('Thriller') !!}
                    {!! Form::checkbox('Thriller', 'Thriller') !!}
                    {!! Form::label('Crime') !!}
                    {!! Form::checkbox('Crime', 'Crime') !!}
                    {!! Form::label('Documentary') !!}
                    {!! Form::checkbox('Documentary', 'Documentary') !!}
                    {!! Form::label('Science Fiction') !!}
                    {!! Form::checkbox('Science Fiction', 'Science Fiction') !!}
                    {!! Form::label('Mystery') !!}
                    {!! Form::checkbox('Mystery', 'Mystery') !!}
                    {!! Form::label('Music') !!}
                    {!! Form::checkbox('Music', 'Music') !!}
                    {!! Form::label('Romance') !!}
                    {!! Form::checkbox('Romance', 'Romance') !!}
                    {!! Form::label('Family') !!}
                    {!! Form::checkbox('Family', 'Family') !!}
                    {!! Form::label('War') !!}
                    {!! Form::checkbox('War', 'War') !!}
                    {!! Form::label('Action & Aventure') !!}
                    {!! Form::checkbox('Action & Aventure', 'Action & Aventure') !!}
                    {!! Form::label('Kids') !!}
                    {!! Form::checkbox('Kids', 'Kids') !!}
                    {!! Form::label('News') !!}
                    {!! Form::checkbox('News', 'News') !!}
                    {!! Form::label('Reality') !!}
                    {!! Form::checkbox('Reality', 'Reality') !!}
                    {!! Form::label('Sci-Fi & Fantasy') !!}
                    {!! Form::checkbox('Sci-Fi & Fantasy', 'Sci-Fi & Fantasy') !!}
                    {!! Form::label('Soap') !!}
                    {!! Form::checkbox('Soap', 'Soap') !!}
                    {!! Form::label('Talk') !!}
                    {!! Form::checkbox('Talk', 'Talk') !!}

                    {!! Form::submit('Trier') !!}
                {!! Form::close() !!}
            </div>

            <div class="center-block">
                <?php
                    $url = \Illuminate\Support\Facades\URL::to('/');
					foreach ($infoSeries as $name){
                        echo "<div class='serie $name->id')'>
                                    <a href='$url/fiche_serie?num_serie=$name->id' ><img class='block' src='https://image.tmdb.org/t/p/w154$name->poster_path'/></a>
									<p class=\"subname\"> $name->name </p>
                              </div>";
                    }
                    if (isset($paginate)){
                        echo $paginate;
                        $infoSeries->links();
                    }
                ?>
            </div>
    </div>
</div>
@endsection
