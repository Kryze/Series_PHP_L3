<?php

namespace movieProject\utils;
use Illuminate\Database\Capsule\Manager as DB;

class ConnectionFactory
{

    public static $v;

    public static function setConfig($file){
        static::$v = parse_ini_file($file);
    }

    public static function makeConnection(){
        $db = new DB();
        $db->addConnection(ConnectionFactory::$v);
        $db->setAsGlobal();
        $db->bootEloquent();
    }

}