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
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <link rel="stylesheet" type="text/css" href="/Series_PHP_L3/resources/assets/css/bootstrap.min.css">
                    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
                    <link href="/Series_PHP_L3/resources/assets/css/style.css" rel="stylesheet" type="text/css">
                    <link href="/Series_PHP_L3/resources/assets/css/siteCss.css" rel="stylesheet" type="text/css">
                </head>
        <body id="image_Ecran">' . self::$rtcarret;
    }

    /**
     * Cette fonction est chargée de générer l'affichage de la barre
     * de navigation
     * @return string
     */
    public static function renderNav()
    {
        return '
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
        ' . self::$rtcarret;
    }

    /**
     * Cette fonction est chargée d'afficher le pied de page, de charger le JavaScript
     * et de fermer le bloc de page
     * @return string
     */
    public static function renderFooter(){
        return '
    </body>
        <footer class="footer">
            <div class="container-foot">
            </div>
        </footer>
        <script type="text/javascript" src="/Series_PHP_L3/resources/assets/js/jquery-3.1.1.js"></script>
        <script type="text/javascript" src="/Series_PHP_L3/resources/assets/js/bootstrap.js"></script>
        <script type="text/javascript" src="/Series_PHP_L3/resources/assets/js/boostrap.min.js""></script>
    </html>';
    }
}