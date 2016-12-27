<?php
// Je teste pour savoir si j'ai quelque chose dans POST
if(isset($_POST['keywords']) && !empty($_POST)) {
    // J'ai quelque chose donc je peux continuer


    // Je commence à séparer les différents mots clés
    $keywords = explode(' ', $_POST['keywords']);
        // J'initialise ma variable pour la requête SQL
        $like = "";
        foreach($keywords as $keyword) {
            // Je concatène
            // Le % en SQL est un joker, ça remplace n'importe quel caractère. Si tu veux que se soit une recherche explicite retire les %
            $like.= " name '%".$keyword."%' OR";
        }
        // Je retire le dernier OR qui n'a pas lieu d'être

        $like = substr($like, 0, strlen($like) - 3);

        $req = "SELECT TES_COLONNES FROM TA_TABLE WHERE ".$like;

    } else {
    // Je n'ai rien, j'informe l'utilisateur
    die('Veuillez saisir quelque chose dans le champs de recherche.');
}
?>

<html>
<head>
    <title>App Name - @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/siteCss.css') }}">
    <script src="{{ URL::asset('js/jquery-3.1.1.js') }}"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--<link href="'.$_SERVER['DOCUMENT_ROOT'].'/projetWebL3/css/siteCss.css" rel="stylesheet" type="text/css">-->
</head>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11 col-md-offset-2">
                <div class="panel panel-default">

                    <?php
                        $res = DB::select($req);
                        dump($res);

                    ?>

                </div>
            </div>
        </div>
    </div>
@endsection

<script>

</script>
</html>

