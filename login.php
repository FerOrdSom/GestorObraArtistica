
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilo.css">
</head>

<body>
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
$stmt->bind_result($username,$userpass);
/* fetch value */
$stmt->fetch();

//basic login logic and redirection
if (!isset($username)){
  echo "el usuario no existe";
}elseif($userpass!=$password){
  echo "password incorrecto";
}else{
  header('Location: index.php');
}


  ?>
