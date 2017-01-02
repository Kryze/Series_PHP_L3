@extends('layouts.app2')
@section('title', 'Catalogue')
@section('content')
    <h1 id="titre2">Nos Séries</h1>
<div class="container">
    <div class="row">
            <?php
                if(isset($res)){
                    echo $res;
                }
            ?>
            <!-- Formulaire de recherche -->
            <div>
                {!! Form::open(['method' => 'get', 'url' => 'recherche']) !!}
                    {!! Form::text('keywords', "", ['class' => 'searchBar']) !!}
                    {!! Form::submit('Rechercher') !!}
                {!! Form::close() !!}
            </div>

            <div class="trierPar">
                {!! Form::open(['url' => 'trier', 'method' => 'get']) !!}
                    {!! Form::label('Aventure') !!}
                    {!! Form::checkbox('Adventure', 'Adventure') !!}
                    {!! Form::label('Fantaisy') !!}
                    {!! Form::checkbox('Fantasy', 'Fantasy') !!}
                    {!! Form::label('Animation') !!}
                    {!! Form::checkbox('Animation', 'Animation') !!}
                    {!! Form::label('Drama') !!}
                    {!! Form::checkbox('Drama', 'Drama') !!}
                    {!! Form::label('Horreur') !!}
                    {!! Form::checkbox('Horror', 'Horror') !!}
                    {!! Form::label('Action') !!}
                    {!! Form::checkbox('Action', 'Action') !!}
                    {!! Form::label('Comedie') !!}
                    {!! Form::checkbox('Comedy', 'Comedy') !!}
                    {!! Form::label('Histoire') !!}
                    {!! Form::checkbox('History', 'History') !!}
                    {!! Form::label('Western') !!}
                    {!! Form::checkbox('Western', 'Western') !!}
                    {!! Form::label('Thriller') !!}
                    {!! Form::checkbox('Thriller', 'Thriller') !!}
                    {!! Form::label('Crime') !!}
                    {!! Form::checkbox('Crime', 'Crime') !!}
                    {!! Form::label('Documentaire') !!}
                    {!! Form::checkbox('Documentary', 'Documentary') !!}
                    {!! Form::label('Science Fiction') !!}
                    {!! Form::checkbox('Science Fiction', 'Science Fiction') !!}
                    {!! Form::label('Mistère') !!}
                    {!! Form::checkbox('Mystery', 'Mystery') !!}
                    {!! Form::label('Musique') !!}
                    {!! Form::checkbox('Music', 'Music') !!}
                    {!! Form::label('Romance') !!}
                    {!! Form::checkbox('Romance', 'Romance') !!}
                    {!! Form::label('Famille') !!}
                    {!! Form::checkbox('Family', 'Family') !!}
                    {!! Form::label('Guerre') !!}
                    {!! Form::checkbox('War', 'War') !!}
                    {!! Form::label('Action & Aventure') !!}
                    {!! Form::checkbox('Action & Aventure', 'Action & Aventure') !!}
                    {!! Form::label('Enfants') !!}
                    {!! Form::checkbox('Kids', 'Kids') !!}
                    {!! Form::label('News') !!}
                    {!! Form::checkbox('News', 'News') !!}
                    {!! Form::label('Realité') !!}
                    {!! Form::checkbox('Reality', 'Reality') !!}
                    {!! Form::label('Sci-Fi & Fantaisy') !!}
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
                ?>
                {!! $infoSeries->links() !!}
            </div>

    </div>
</div>
@endsection
