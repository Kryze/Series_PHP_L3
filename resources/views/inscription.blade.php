<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="{{ asset('assets/js/jquery-3.1.1.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/css/bootstrap.js') }}"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/Series_PHP_L3/resources/assets/css/style.css" rel="stylesheet" type="text/css">
</head><body>
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
                    <a href="{{ url('/') }}">Accueil<br></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="text-center">Connexion</h1>
                <p></p>
                <p class="text-center">Si vous possédez déjà un compte veuillez vous connectez ici</p>
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label for="inputEmail3" class="control-label">Identifiant</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Pseudo">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label for="inputPassword3" class="control-label">Mot de passe</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Mot de passe">
                        </div>
                    </div>
                    <!--<div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox">Remember me</label>
                        </div>
                      </div>
                    </div>-->
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Connexion</button>
                        </div>
                    </div>
                </form>
                <p></p>
            </div>
            <div class="col-md-6">
                <h1 class="text-center">Inscription</h1>
                <p></p>
                <p class="text-center">Pour participer à cette superbe aventure aux travers des séries télévisées
                    inscris-toi ici !</p>
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label for="inputEmail3" class="control-label">Pseudo</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Pseudo">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label for="inputPassword3" class="control-label">Mot de passe
                                <br>
                            </label>
                        </div>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Mot de passe">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label for="inputPassword3" class="control-label">Confirmation &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp;
                                <br>
                            </label>
                        </div>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Confirmation">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label for="inputPassword3" class="control-label">Email &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                <br>
                            </label>
                        </div>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Inscription</button>
                        </div>
                    </div>
                </form>
                <p></p>
            </div>
        </div>
    </div>
</div>
<p class="text-center"> On pourrait peut-être mettre un block de citations de séries aléatoire prises dans la base de données ici</p>


</body></html>

<?php
/**
 * Created by PhpStorm.
 * User: rudy
 * Date: 23/11/16
 * Time: 19:17
 */

