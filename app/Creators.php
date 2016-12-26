<?php

namespace projet\models;

class Creators extends \Illuminate\Database\Eloquent\Model {
	protected $table ='creators';
	protected $primaryKey ='id' ;
	public $timestamps = false;

  public function series(){
    return $this->belongsToMany('\projet\models\Series', 'seriescreators', 'creator_id', 'series_id');
  }
}
