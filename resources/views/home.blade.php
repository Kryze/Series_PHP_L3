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
<div class="container">
    <div class="row">
        <div class="col-md-11 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>


                <div class="panel-body">
                    You are logged in!
                </div>

                <h1></h1>
                <div class="searchBar">
                    <form method="post" action="recherche">
                        <input name="keywords" type="search"/>
                        <input type="submit" value="Rechercher"/>
                    </form>
                </div>

                <div>
                    <?php
                        $url = \Illuminate\Support\Facades\URL::to('/');

                        foreach ($infoSeries as $name){
                            echo "<div class='serie $name->id')'>
                                        <a href='$url/fiche_serie.blade.php?num_serie=$name->id' ><img src='https://image.tmdb.org/t/p/w154$name->poster_path'/></a>
                                  </div>";
                        }
                    ?>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection

<script>

</script>
</html>
