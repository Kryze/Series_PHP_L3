<?php

require_once('C:\wamp64\www\Series_PHP_L3\resources\views\GlobalView.php');

$htmlHead=\biblio\vue\GlobalView::renderHead();
$htmlNav=\biblio\vue\GlobalView::renderNav();
$htmlPresentation='
    <div class="section">
        <div class="container">
            <div class="row">
                <h3>Projet Web L3 Miage</h3>
                <div class="col-lg-8">
                </div>
                <div class="col-lg-4">
                    <h1 id="titre">Toutes les séries à dispositions</h1>
                </div>
             </div>
             <div class="row">
                    <div class="saut_ligne">
                        <a class="btn btn-lg btn-warning" href="https://lmgtfy.com/?q=Comment+cr%C3%A9e+une+page+d%27inscription+html%5Ccss+%3A3" title="Troll">Regarder des séries</a>
                    </div>
             </div>
         </div>
    </div>
';
$htmlCorps='
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 text-left">
                <div id="carousel-example" data-interval="5000" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="/Series_PHP_L3/resources/assets/img/westworld.jpg">
                            <div class="carousel-caption">
                                <h2>Westworld</h2>
                                <p>Le pays des cow-boy mécaniques</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="/Series_PHP_L3/resources/assets/img/got.jpg">
                            <div class="carousel-caption">
                                <h2>Game of Thrones</h2>
                                <p>You know nothing, Jon Snow</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="/Series_PHP_L3/resources/assets/img/12monkeys.jpg">
                            <div class="carousel-caption">
                                <h2>12 Monkeys</h2>
                                <p>C\'est le passé ou le présent ou le futur ?</p>
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example" data-slide="prev"><i class="icon-prev  fa fa-angle-left"></i></a>
                    <a class="right carousel-control" href="#carousel-example" data-slide="next"><i class="icon-next fa fa-angle-right"></i></a>
                </div>
                <h1 class="text-center">Bienvenue sur ShowTracker</h1>
                <p class="text-center">Afin de profiter entièrment de l\'expérience de ShowTracker, merci de
                    créer un compte ou de vous connecter</p>
            </div>
        </div>
    </div>
</div>';
$htmlFooter=\biblio\vue\GlobalView::renderFooter();
//ajouter $htmlCorps pour l'affichage du carousel et $htmlNav pour la barre de navigation
$html=$htmlHead.$htmlPresentation.$htmlFooter;
echo $html;