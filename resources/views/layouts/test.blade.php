
<html>
@section('head')
<head>
    <title>App Name - @yield('title')</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/siteCss.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--<link href="'.$_SERVER['DOCUMENT_ROOT'].'/projetWebL3/css/siteCss.css" rel="stylesheet" type="text/css">-->
</head>
@show
<body id="image_Ecran">
@section('sidebar')
    <div class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"><span>ShowTracker</span></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="#">Inscription</a>
                    </li>

                    <li class="active">
                        <a href="#">Connexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@show
@section('bodyaccueil')
    <div class="section">
        <div class="container">
            <div class="row">
                <h3>ShowTracker</h3>
                <div class="col-lg-8">
                </div>
                <div class="col-lg-4">
                    <h1 id="titre">Suivez la progression de vos séries en temps réel !</h1>
                </div>
            </div>
            <div class="row">
                <div class="saut_ligne">
                    <form method="get" action="index.php/inscription">
                        <p class="text-left"> <input class="btn btn-lg btn-warning" type="submit" name="connexion" value="Regarder des séries"/></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
 @show
</body>
<footer class="footer">
@section('footer')
        <div class="container-foot">
        </div>
    </footer>
    <script type="text/javascript" src="{{ URL::asset('js/jquery-3.1.1.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/boostrap.min.js') }}"></script>
</footer>
@show
</html>
