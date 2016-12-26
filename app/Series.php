<?php

namespace projet\models;

class Series extends \Illuminate\Database\Eloquent\Model {
	protected $table ='series';
	protected $primaryKey ='id' ;
	public $timestamps = false;

  public function createurs(){
    return $this->belongsToMany('\projet\models\Creators', 'seriescreators', 'series_id', 'creator_id');
  }

  public function genres(){
    return $this->belongsToMany('\projet\models\Genres', 'seriesgenres', 'series_id', 'genre_id');
  }

  // peut être une erreur
  public function saisons(){
    return $this->hasManyThrough('\projet\models\Seasons', '\projet\models\SeriesSeasons', 'series_id', 'id', 'id');
  }
}
