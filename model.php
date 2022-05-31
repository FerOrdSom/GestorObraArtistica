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
    try{
    $mysqli = new mysqli("localhost", "root", "", "gestion");
    $stmt = $mysqli->prepare("INSERT INTO users(name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $newusername, $newemail, $hashed_password); // "is" means that $id is bound as an integer and $label as a string
    $stmt->execute();
    $user = Model::get_user_id_named($newusername);
    $stmt = $mysqli->prepare("INSERT INTO profiles(user) VALUES (?)");
    $stmt->bind_param("i", $user);
    $stmt->execute();
    $_POST=null;
    }catch (Exception $e) {
    echo "<div class=\"alert alert-danger text-center\" role=\"alert\">
    Error: User already exists</div>" ;
    die();
    }
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
  public static function get_user_id(){
    $user = $_SESSION['username'];
    $mysqli = new mysqli("localhost", "root", "", "gestion");
    $stmt = $mysqli->prepare("SELECT id FROM users WHERE name=?");
    /* bind parameters for markers */
    $stmt->bind_param("s", $user);
    /* execute query */
    $stmt->execute();
    /* bind result variables */
    $stmt->bind_result($id); //$userpass is hashed
    /* fetch value */
    $stmt->fetch();
    return $id;
  }
  public static function get_user_id_named($user){
    $mysqli = new mysqli("localhost", "root", "", "gestion");
    $stmt = $mysqli->prepare("SELECT id FROM users WHERE name=?");
    /* bind parameters for markers */
    $stmt->bind_param("s", $user);
    /* execute query */
    $stmt->execute();
    /* bind result variables */
    $stmt->bind_result($id); //$userpass is hashed
    /* fetch value */
    $stmt->fetch();
    return $id;
  }
  public static function get_user_profile(){
    $user = Model::get_user_id();
    $mysqli = new mysqli("localhost", "root", "", "gestion");
    $stmt = $mysqli->prepare("SELECT nombre,apellido_1,apellido_2,email,telefono_1,telefono_2,web,direccion,img_profile,img_back,notas FROM profiles WHERE user=?");
    /* bind parameters for markers */
    $stmt->bind_param("s", $user);
    /* execute query */
    $stmt->execute();
    /* bind result variables */
    $stmt->bind_result($name,$surname1,$surname2,$email,$phone1,$phone2,$web,$adress,$img_profile,$img_back,$notes);
    /* fetch value */
    $stmt->fetch();
    $result = array(
    "name" => "$name",
    "surname1" => "$surname1",
    "surname2" => "$surname2",
    "email" => "$email",
    "phone1" => "$phone1",
    "phone2" => "$phone2",
    "web" => "$web",
    "adress" => "$adress",
    "img_profile" => "$img_profile",
    "img_back" => "$img_back",
    "notes" => "$notes",
    );
    return $result;
  }
  public static function set_user_profile($name,$surname1,$surname2,$email,$phone1,$phone2,$web,$adress,$notes){
    $user = Model::get_user_id();
    $mysqli = new mysqli("localhost", "root", "", "gestion");
    $stmt = $mysqli->prepare("UPDATE profiles SET nombre = ?,
                                                  apellido_1 = ?,
                                                  apellido_2 = ?,
                                                  email = ?,
                                                  telefono_1 = ?,
                                                  telefono_2 = ?,
                                                  web = ?,
                                                  direccion = ?,
                                                  notas = ?
                                                  WHERE user=?");
    /* bind parameters for markers */
    $stmt->bind_param("sssssssssi",$name,$surname1,$surname2,$email,$phone1,$phone2,$web,$adress,$notes,$user);
    /* execute query */
    $stmt->execute();
  }
  public static function create_colection($collection_name){
    $user = Model::get_user_id();
    $mysqli = new mysqli("localhost", "root", "", "gestion");
    $stmt = $mysqli->prepare("INSERT INTO collections(user, name) VALUES (?, ?)");
    $stmt->bind_param("is", $user, $collection_name); // "is" means that $id is bound as an integer and $label as a string
    $stmt->execute();
  }
  public static function get_user_collections(){
    $user = Model::get_user_id();
    $mysqli = new mysqli("localhost", "root", "", "gestion");
    $stmt = $mysqli->prepare("SELECT id, name FROM collections WHERE user=?");
    $stmt->bind_param("s", $user);
    /* execute query */
    $stmt->execute();
    /* bind result variables */
    $result = $stmt->get_result();
    $options = "";
      while ($row = $result->fetch_assoc()) {
        $options = $options."<option value=\"".$row['id']."\">".$row['name']."</option>\n\t\t\t";
      }
    return $options;
  }
  public static function create_work($collection, $work_name, $url){
    $mysqli = new mysqli("localhost", "root", "", "gestion");
    $stmt = $mysqli->prepare("INSERT INTO works (collection, name, url) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $collection, $work_name, $url); // "is" means that $id is bound as an integer and $label as a string
    $stmt->execute();
  }
  public static function get_collection_works($id){
    $mysqli = new mysqli("localhost", "root", "", "gestion");
    $stmt = $mysqli->prepare("SELECT name, url FROM works WHERE collection=?");
    $stmt->bind_param("s", $id);
    /* execute query */
    $stmt->execute();
    /* bind result variables */
    $result = $stmt->get_result();
    $works = "";
      while ($row = $result->fetch_assoc()) {
        $works = $works.
        "<div class=\"col-3 my-2 border rounded\">
          <div class=\"row justify-content-center rounded\">
          <img style=\"object-fit: cover; width: 100%; height: 250px;\" src=\"".$row["url"]."\"></img>
          </div>
          <p class=\"align-bottom text-center\">".$row["name"]."\"</p>
        </div>";
      }
    return $works;
  }
}
 ?>
