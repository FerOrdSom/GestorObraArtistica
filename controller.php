<?php
require_once "model.php";
class Controller {
  public static function check_login_introduced(){
    if (isset($_POST["username"]) && isset($_POST["password"])){
    $user = $_POST["username"];
    $password = $_POST["password"];
    echo "dev info: usuario introducido: ".$user;
    echo "<br>";
    echo "dev info: password introducido: ".$password;
    echo "<br>";
    }
  }
  public static function register(){
    if (isset($_POST["newusername"]) &&
            isset($_POST["newemail"]) &&
            isset($_POST["newpassword"]) &&
            isset($_POST["checkpassword"])){
    $newusername = $_POST["newusername"];
    $newemail = $_POST["newemail"];
    $newpassword = $_POST["newpassword"];
    $checkpassword = $_POST["checkpassword"];

    //basic password check
    if ($newpassword != $checkpassword){
      echo "el password no coincide";
    }
    /*hashing password for storing*/
    $hashed_password = password_hash($newpassword, PASSWORD_DEFAULT);
    Model::create_user($newusername,$newemail,$hashed_password);

    }
  }
  public static function login(){
    if (isset($_POST["username"]) && isset($_POST["password"])){
    $user = $_POST["username"];
    $password = $_POST["password"];
    $result = Model::login($user);
    if ($result["username"]==""){
      echo "el usuario no existe";
    }elseif(!password_verify($password , $result["userpass"])){
      echo "password incorrecto";
    }else{
    //iniciate session and redirect to main page
    session_start();
    if (!isset($_SESSION['username'])) {
      $_SESSION['username'] = $user;
    }
      header('Location: portalview.php');
    }
  }
  }
  public static function passrecovery(){
    if (isset($_POST["useremail"])){
      //cambiar mail y enviar correo
      echo "Check your email";
      header( "refresh:5; url=loginview.php" );

    }
  }
}
?>
