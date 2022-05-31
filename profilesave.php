<?php
require_once "Model.php";
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: loginview.php');
}
Model::set_user_profile($_POST["name"],
                        $_POST["surname1"],
                        $_POST["surname2"],
                        $_POST["email"],
                        $_POST["phone1"],
                        $_POST["phone2"],
                        $_POST["web"],
                        $_POST["adress"],
                        $_POST["notes"],);
header ("Location: portalview.php?cnt=profile");
 ?>
