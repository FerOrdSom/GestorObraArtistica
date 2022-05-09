
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilo.css">
</head>

<body>
<!--login form -->
<form action="login.php" method="get" class="form-example">
  <div class="login-form">
    <label for="username">Introduzca usuario: </label>
    <input type="text" name="username" required>
  </div>
  <div class="login-form">
    <label for="password">Introduzca password: </label>
    <input type="password" name="password" required>
  </div>
  <div class="login-form">
    <input type="submit" value="Login">
  </div>
</form>
<!--register form -->
<form action="login.php" method="get" class="form-example">
  <div class="register-form">
    <label for="newusername">Introduzca nombre de usuario: </label>
    <input type="text" name="newusername" required>
  </div>
  <div class="register-form">
    <label for="newemail">Introduzca su email: </label>
    <input type="email" name="newemail" required>
  </div>
  <div class="register-form">
    <label for="newpassword">Introduzca su password: </label>
    <input type="text" name="newpassword" required>
  </div>
  <div class="register-form">
    <label for="checkpassword">Confirme su password: </label>
    <input type="text" name="checkpassword" required>
  </div>
  <div class="login-form">
    <input type="submit" value="Registrar">
  </div>
</form>

</body>
</html>


<?php
//Connection check, delete if succesful
    $mysqli = new mysqli("localhost", "root", "", "gestion");
    if ($mysqli){
      echo "dev info: connection succeded <br>";
    }else{
      echo "dev info: connection failed <br>";
    }
?>

<?php
//Checking trivial Query
$sql = "SELECT * from users";
$result = $mysqli->query($sql);
while ($row = $result->fetch_object()){
        echo "dev info: Username = ".$row->name;
        echo "<br>";
        echo "dev info: Password = ".$row->password;
        echo "<br>";
    }
 ?>

 <?php
//Creating basic login logic with prepared statements
if (isset($_GET["username"]) && isset($_GET["password"])){
$user = $_GET["username"];
$password = $_GET["password"];
echo "dev info: usuario introducido: ".$user;
echo "<br>";
echo "dev info: password introducido: ".$password;
echo "<br>";
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

//basic login logic and redirection
if (!isset($username)){
  echo "el usuario no existe";
}elseif(!password_verify($password , $userpass)){
  echo "password incorrecto";
}else{
//iniciate session and redirect to main page
session_start();
if (!isset($_SESSION['username'])) {
  $_SESSION['username'] = $username;
}
  header('Location: index.php');
}
}
?>
<?php
//Creating basic register logic with prepared statements
if (isset($_GET["newusername"]) &&
        isset($_GET["newemail"]) &&
        isset($_GET["newpassword"]) &&
        isset($_GET["checkpassword"])){
$newusername = $_GET["newusername"];
$newemail = $_GET["newemail"];
$newpassword = $_GET["newpassword"];
$checkpassword = $_GET["checkpassword"];

//basic password check
if ($newpassword != $checkpassword){
  echo "el password no coincide";
}else{
echo "<br>dev info: "."newuser: ".$newusername." newemail: ".$newemail." newpass: ".$newpassword. " checkpass: ".$checkpassword;
/*hashing password for storing*/
$hashed_password = password_hash($newpassword, PASSWORD_DEFAULT);

/* Prepared statement, stage 1: prepare */
$stmt = $mysqli->prepare("INSERT INTO users(name, email, password) VALUES (?, ?, ?)");

/* Prepared statement, stage 2: bind and execute */

$stmt->bind_param("sss", $newusername, $newemail, $hashed_password); // "is" means that $id is bound as an integer and $label as a string

$stmt->execute();
}
}
 ?>
