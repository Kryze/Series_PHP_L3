
<html>
@section('head')
<head>
    <title>App Name - @yield('title')</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.css') }}">
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
                <a href="{{ url('/') }}" class="navbar-brand"><span>ShowTracker</span></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="{{ url('inscription') }}">Inscription/Connexion</a>
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
                <h1 id="sectitre">L'actualité de vos series en temps réel</h1>
                <div class="col-lg-8">
                </div>
               <div class="col-lg-12">
               <img src="{{ URL::asset('img/westworld.jpg') }}" alt="Westworld"/>
               </div>
                <div class="col-lg-12">
                    <h3 id="titre">Profitez d'une experience exceptionnel !</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-11">
                    <form method="get" action="{{ url('inscription') }}">
                        <p class="text-center"> <input class="btn btn-lg btn-warning" type="submit" name="connexion" value="Démarrez l'aventure"/></p>
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


@section('inscription')
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 block">
                    <h2>Connexion</h2>
                    <form method="post" action="/">
                        <p> Nom d\'utilisateur : <input type="text" name="utilisateur"/> </p>
                        <p> Mot de passe : <input type="password" name="mdp"/> </p>
                        <p class="text-center"> <input class="btn btn-md btn-warning" type="submit" name="connexion" value="Se connecter"/></p>
                    </form>
                </div>
                <div class="col-lg-4 col-md-4 block">
                    <h2>Inscription</h2>
                    <form method="post" action="/">
                        <p> Nom d\'utilisateur : <input type="text" name="utilisateur"/> </p>
                        <p> Mot de passe : <input type="password" name="mdp"/> </p>
                        <p> Verifier mot de passe : <input type="password" name="mdp2"/> </p>
                        <p> Adresse : <input type="text" name="adresse"/> </p>
                        <p class="text-center"> <input class="btn btn-md btn-warning" type="submit" name="connexion" value="S\'inscrire"/></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @show
</html>
