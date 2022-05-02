<?php
readfile("login.html");
?>

<?php
    $mysqli = new mysqli("localhost", "root", "", "gestion");
    if ($mysqli){
      echo "dev info: connection succeded";
    }else{
      echo "dev info: connection failed";
    }
?>
