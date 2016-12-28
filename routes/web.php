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

Route::get('/', function () {
    return view('propre');
});

Route::get('/inscription', 'FormController@index');

Route::post('/confirm', 'FormController@confirm');

Route::post('/auth', 'FormController@auth');

Route::get('/home', 'HomeController@index');

Route::get('/recherche', 'SearchController@index');

Route::get('/fiche_serie', 'FicheController@fiche');

Route::group(['prefix' => 'fiche'], function(){

    Route::get('/{id}', function($id){
        return view('ficheSerie', $id);
    });

});
