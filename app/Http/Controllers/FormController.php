<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use app\Users as Users;

class FormController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('inscription');
    }

    public function confirm()
    {
      $message = '';
      $valid = true;
      if(!isset($_POST['login']) || strlen($_POST['login']) < 4){
        $valid = false;
        $message .= '<p class="error">Le nom d\'utilisateur est trop court.</p>';
      }else{
        $login = $_POST['login'];
      }

      if(!isset($_POST['pwd'])){
          $valid = false;
          $message .= '<p class="error">Le mot de passe doit être renseigné.</p>';
      }else{
        $pwd = $_POST['pwd'];
      }

      if(!isset($_POST['pwd2']) || $pwd != $_POST['pwd2']){
          $valid = false;
          $message .= '<p class="error">Les mots de passe doivent correspondre.</p>';
      }

      if (!isset($_POST['email']) || !contains('@', $_POST['email']) || !contains('.', $_POST['email'])){
          $valid = false;
          $message .= '<p class="error">L\'email entré est invalide.</p>';
        }
        else{
          $email = $_POST['email'];
        }

        if($valid){
          DB::insert('insert into users (name, password, email) values (?, ?, ?)', [$login, $pwd, $email]);
          $_SESSION['login'] = $login;
          $_SESSION['email'] = $email;
          return view('home');
        }else{
          return view('inscription');
        }

    }
}
