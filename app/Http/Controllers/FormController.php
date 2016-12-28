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

    public function index($m ='')
    {
        return view('inscription', ['message' => $m]);
    }

    public function auth()
    {
      if(isset($_POST['login']) && isset($_POST['mdp'])){
        $users = DB::table('users')
                   ->select('id', 'name', 'email')
                   ->where([
                        ['name', '=', $_POST['login']],
                        ['password', '=', $_POST['mdp']]
                    ])->first();
        if(isset($users)){
          $_SESSION['id'] = $users->id;
          $_SESSION['login'] = $users->name;
          $_SESSION['email'] = $users->email;
          return redirect()->action('HomeController@index');
        }else{
          $message = 'Le nom d\'utilisateur et le mot de passe ne correspondent pas.';
          return view('inscription', ['message' => $message]);
        }
      }
    }

    public function confirm()
    {
      $message = '';
      $valid = true;
      if(!isset($_POST['login']) || strlen($_POST['login']) < 4){
        $valid = false;
        $message .= 'Le nom d\'utilisateur est trop court.';
      }else{
        $login = $_POST['login'];
      }

      if(!isset($_POST['pwd'])){
          $valid = false;
          $message .= 'Le mot de passe doit être renseigné.';
      }else{
        $pwd = $_POST['pwd'];
      }

      if(!isset($_POST['pwd2']) || $pwd != $_POST['pwd2']){
          $valid = false;
          $message .= 'Les mots de passe doivent correspondre.';
      }

      if (!isset($_POST['email']) || !contains('@', $_POST['email']) || !contains('.', $_POST['email'])){
          $valid = false;
          $message .= 'L\'email entré est invalide.';
        }
        else{
          $email = $_POST['email'];
        }

        if($valid){
          $users = DB::table('users')
                     ->select('name')
                     ->where('name', '=', $login)
                     ->first();
          if(!isset($users)){
            $id = DB::table('users')->insertGetId(
              ['name' => $login, 'password' => $pwd, 'email' => $email]
            );
            $_SESSION['id'] = $id;
            $_SESSION['login'] = $login;
            $_SESSION['email'] = $email;
            return redirect()->action('HomeController@index');
          }else{
            return view('inscription', ['message' => $message]);
          }
        }else{
          return view('inscription', ['message' => $message]);
        }

    }

    public function logout()
    {
      $_SESSION = array();
      return view('inscription');
    }
}
