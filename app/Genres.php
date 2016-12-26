<?php

namespace projet\models;

class Genres extends \Illuminate\Database\Eloquent\Model {
	protected $table ='genres';
	protected $primaryKey ='id' ;
	public $timestamps = false;

  public function series(){
    return $this->belongsToMany('\projet\models\Series', 'seriesgenres', 'genre_id', 'series_id');
  }
}
