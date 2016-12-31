<?php
/**
 * Created by PhpStorm.
 * User: Corentin
 * Date: 31/12/2016
 * Time: 17:55
 */
use Illuminate\Support\Facades\DB;

session_start();

if(isset($_POST['non_vue'])) {
    DB::insert('insert into usersepisodes (user_id, episode_id,rating) values (?, ?, ?)', array($_SESSION["id"], $_POST['id'],'5'));
}

if(isset($_POST['vue'])) {
    DB::delete('delete from usersepisodes where (user_id, episode_id,rating) values (?, ?, ?)', array($_SESSION["id"], $_POST['id'],'5'));
}