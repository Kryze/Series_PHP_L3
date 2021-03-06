<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
session_start();
/*Route::get('/', function () {
    return view('propre');
});*/

Route::get('/aboutus', function () {
    return view('aboutus');
});

Route::get('/', 'HomeController@index');

Route::get('/inscription/{message?}', 'FormController@index');

Route::post('/confirm', 'FormController@confirm');

Route::post('/auth', 'FormController@auth');

Route::get('/logout', 'FormController@logout');

Route::get('/trier', 'HomeController@trierPar');

Route::get('/recommandation', 'RecommandationController@index');

Route::get('/recherche', 'SearchController@index');

Route::get('/profil', 'ProfilController@profil');

Route::get('/episode', 'EpisodeController@episode');

Route::get('/fiche_serie', 'FicheController@fiche');

Route::get('test/{name}', ['uses' => 'HomeController@trierPar']);
