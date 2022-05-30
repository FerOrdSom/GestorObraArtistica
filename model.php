<?php
class Model{
  public static function read_users(){
    echo "### read_users() ### <br>";
    $mysqli = new mysqli("localhost", "root", "", "gestion");
    $sql = "SELECT * from users";
    $result = $mysqli->query($sql);
    while ($row = $result->fetch_object()){
            echo "dev info: Username = ".$row->name;
            echo "<br>";
            echo "dev info: Password = ".$row->password;
            echo "<br>";
        }
  }
  public static function create_user($newusername, $newemail, $hashed_password){
    $mysqli = new mysqli("localhost", "root", "", "gestion");
    $stmt = $mysqli->prepare("INSERT INTO users(name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $newusername, $newemail, $hashed_password); // "is" means that $id is bound as an integer and $label as a string
    $stmt->execute();
    $_POST=null;
    header("Location: loginview.php");
  }
  public static function login($user){
    $mysqli = new mysqli("localhost", "root", "", "gestion");
        /* create a prepared statement */
    $stmt = $mysqli->prepare("SELECT name,password FROM users WHERE name=?");
    /* bind parameters for markers */
    $stmt->bind_param("s", $user);
    /* execute query */
    $stmt->execute();
    /* bind result variables */
    $stmt->bind_result($username,$userpass); //$userpass is hashed
    /* fetch value */
    $stmt->fetch();
    $result = array(
    "username" => "$username",
    "userpass" => "$userpass",
    );
    return $result;
  }
}
 ?>
