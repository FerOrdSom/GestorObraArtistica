<?php
$password= "UserPassword";
echo "This is the input password: ".$password."<br>";
// $hashed_password = "$2y$10\$EDJ4lQzlIZS/m47df2uRDOXz1CMaFirG9Rj2kryvTRKwoWymFvIx2";
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
echo "This is the hashed password: ".$hashed_password."<br>";
if(password_verify($password, $hashed_password)){
  echo "Password_verify returns: true";
}else{
  echo "ERROR: Password_verify returns: false";
}
?>
