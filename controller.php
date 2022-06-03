<?php
require_once "model.php";
require_once "view.php";
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
      echo "<div class=\"alert alert-danger text-center\" role=\"alert\">
      Error: Passwords don't match </div>";
      die();
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
      echo "<div class=\"alert alert-danger text-center\" role=\"alert\">
      Error: User don't exist </div>";
    }elseif(!password_verify($password , $result["userpass"])){
      echo "<div class=\"alert alert-danger text-center\" role=\"alert\">
      Error: Wrong password </div>";
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
  public static function get_content(){
    if (!isset($_GET["cnt"])){
      return View::get_portal_view_welcome_content();
    }else{
      switch ($_GET["cnt"]) {
    case "gallery":
        return View::get_gallery_content();;//crear gallery content y pasarselo
        break;
    case "records":
        return View::get_records_content();//crear records content y pasarselo
        break;
    case "profile":
        return View::get_profile_content();//crear profile content y pasarselo
        break;
    default:
        return View::get_portal_view_welcome_content();
      }
    }
  }

}
?>
