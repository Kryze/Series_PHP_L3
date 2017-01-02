<?php

namespace ShowTracker\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use app\Users as Users;

class FormController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Genere le salage du mot de passe pour la base de données
     *
     * @return salt
     */
    function generateSalt()
    {
    $salt = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ", 10)), 0, 10);
    return $salt;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($m ='')
    {
        return view('inscription', ['message' => $m]);
    }

    /**
     * Fonction appele lorsque l'on clique sur le bouton Se Connecter
     *
     * @return \Illuminate\Http\Response
     */
    public function auth()
    {
      // Si le login et le mot de passe son renseigné
      if(isset($_POST['login']) && isset($_POST['mdp'])){
        // on cherche dans la table users un  utilisateur avec ce login
        $users = DB::table('users')
                   ->select('id', 'name', 'password', 'email', 'salt')
                   ->where([
                        ['name', '=', $_POST['login']]
                    ])->first();
        // si on trouve un utilisateur et que le mot de passe correspond
        if(isset($users) && hash('sha384', $users->salt.$_POST['mdp']) == $users->password){
          $_SESSION['id'] = $users->id;
          $_SESSION['login'] = $users->name;
          $_SESSION['email'] = $users->email;
          return redirect()->action('HomeController@index');
        }else{
          $message = ' Le nom d\'utilisateur et le mot de passe ne correspondent pas. ';
          return view('inscription', ['message' => $message]);
        }
      }
    }

    /**
     * Fonction appele lorsque l'on clique sur le bouton Inscritpion
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm()
    {
      $message = '';
      $valid = true;
      // verifie que le login est renseigné et qu'il fait plus de 4 caractères
      if(!isset($_POST['login']) || strlen($_POST['login']) < 4){
        $valid = false;
        $message .= ' Le nom d\'utilisateur est trop court. ';
      }else{
        $login = $_POST['login'];
      }

      // verifie que le mot de passe est renseigné et qu'il fait plus de 6 caractères
      if(!isset($_POST['pwd']) || strlen($_POST['pwd']) < 6){
          $valid = false;
          $message .= ' Le mot de passe doit être renseigné. ';
      }else{
        $pwd = $_POST['pwd'];
      }

      // vérifie que les mots de passe sont les memes
      if(!isset($_POST['pwd2']) || $pwd != $_POST['pwd2']){
          $valid = false;
          $message .= ' Les mots de passe doivent correspondre. ';
      }

      // verifie l'adresse email
      if (!isset($_POST['email']) || !contains('@', $_POST['email']) || !contains('.', $_POST['email'])){
          $valid = false;
          $message .= ' L\'email entré est invalide. ';
        }
        else{
          $email = $_POST['email'];
        }

        // si tout est bien vérifié
        if($valid){
          // on vérifie que le nom d'utilisateur n'est pas déja pris
          $users = DB::table('users')
                     ->select('name')
                     ->where('name', '=', $login)
                     ->first();
          // si il est libre
          if(!isset($users)){
            // on génére le salage
            $salt = $this->generateSalt();
            $pwdCrypt = hash('sha384', $salt.$pwd);
            // on insère le nouvel utilisateur dans la base de données
            $id = DB::table('users')->insertGetId(
              ['name' => $login, 'password' => $pwdCrypt, 'email' => $email, 'salt' => $salt]
            );
            $_SESSION['id'] = $id;
            $_SESSION['login'] = $login;
            $_SESSION['email'] = $email;
            // on redirige vers le catalogue de série
            return redirect()->action('HomeController@index');
          }else{
            $message = 'Un utilisateur possède ce nom d\'utilisateur';
            return view('inscription', ['message' => $message]);
          }
        }else{
          return view('inscription', ['message' => $message]);
        }

    }

    public function logout()
    {
      $_SESSION = array();
      return view('inscription', ['message' => '']);
    }


}
