<?php
/**
 * Created by PhpStorm.
 * User: Cyprien
 * Date: 14/01/2016
 * Time: 15:25
 */

namespace biblio\vue;


class GlobalView
{
    public static $rtcarret = "\r\n";

    /**
     * Cette fonction est chargée de générer le HEAD du site
     * @return string
     */
    public static function renderHead()
    {
        return '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Accueil</title>
        <link href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/css/font-awesome.css" rel="stylesheet"/>
        <script type="text/javascript" src="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/js/jquery.min.js"></script>
    </head>
    <body role="document">
        ' . self::$rtcarret;
    }

    public static function renderClassHead($class){
        return '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Accueil</title>
        <link href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/css/font-awesome.css" rel="stylesheet"/>
        <script type="text/javascript" src="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/js/jquery.min.js"></script>
    </head>
    <body role="document" class="'.$class.'">
        ' . self::$rtcarret;
    }

    /**
     * Cette fonction est chargée de générer l'affichage de la barre
     * de navigation
     * @return string
     */
    public static function renderNav()
    {
        return '
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Ouvrir</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/">BIBPERSO</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
           <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-book"></i>&nbsp; Bibliotheques <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/index.php/all/biblio">Afficher les bibliotheques</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/index.php/ajouter/biblio">Ajouter une bibliotheque</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-book"></i>&nbsp; Livres <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/index.php/all/livres">Afficher les livres</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/index.php/ajouter/livres">Ajouter un livre</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/index.php/rechercher/livres">Chercher un livre</a></li>
                 <li role="separator" class="divider"></li>
                <li><a href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/index.php/livresfav">Livres favoris</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/index.php/livrespret">Livres prêtés</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-film"></i>&nbsp; Films <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/index.php/all/films">Afficher les films</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/index.php/ajouter/films">Ajouter un film</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/index.php/rechercher/films">Chercher un film</a></li>
                 <li role="separator" class="divider"></li>
                <li><a href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/index.php/filmsfav">Films favoris</a></li>
                 <li role="separator" class="divider"></li>
                <li><a href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/index.php/filmspret">Films prêtés</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-music"></i>&nbsp; Albums Musicaux <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/index.php/all/albums">Afficher les Albums</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/index.php/ajouter/album">Ajouter un Album</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/index.php/rechercher/albums">Chercher un album</a></li>
                 <li role="separator" class="divider"></li>
                <li><a href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/index.php/albumsfav">Albums favoris</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/index.php/albumspret">Albums prêtés</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gamepad"></i>&nbsp; Jeux Vidéos <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/index.php/all/jeux">Afficher les Jeux</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/index.php/ajouter/jeux">Ajouter un Jeu</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/index.php/rechercher/jeux">Chercher un jeu</a></li>
                 <li role="separator" class="divider"></li>
                <li><a href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/index.php/jeuxfav">Jeux favoris</a></li>
                 <li role="separator" class="divider"></li>
                <li><a href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/index.php/jeuxpret">Jeux prêtés</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>&nbsp; Votre compte <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/deconnexion">Deconnexion</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container theme-showcase" role="main">
        ' . self::$rtcarret;
    }

    public static function renderNavDisconnected(){
        return '
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Ouvrir</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/">BIBPERSO</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>&nbsp; Votre compte <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/inscription">Inscription</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/connexion">Connexion</a></li>

              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container theme-showcase" role="main">
        ' . self::$rtcarret;
    }

    /**
     * Cette fonction est chargée d'afficher le pied de page, de charger le JavaScript
     * et de fermer le bloc de page
     * @return string
     */
    public static function renderFooter(){
        return '
        </div>
        <footer class="footer">
            <div class="container-foot">
                <p class="text-muted-foot">Copyright &copy; 2016 - Corentin Legris, Benjamin Denys, Cyprien Aubry, Thomas Osty - S3C</p>
            </div>
        </footer>
        <script type="text/javascript" src="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/js/bootstrap.min.js"></script>
        </body>
    </html>
        ';
    }

    public static function renderFooterBug(){
        return '
        </div>
        <footer class="footer bug">
            <div class="container-foot">
                <p class="text-muted-foot">Copyright &copy; 2016 - Corentin Legris, Benjamin Denys, Cyprien Aubry, Thomas Osty - S3C</p>
            </div>
        </footer>
        <script type="text/javascript" src="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://127.0.0.1/s3c_s2_aubry_denys_legris_osty/js/main.js"
        </body>
    </html>
        ';
    }
}