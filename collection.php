<?php
require_once "model.php";
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: loginview.php');
}
$collection_name = $_POST["collection_name"];
Model::create_colection($collection_name);
header ("Location: portalview.php?cnt=gallery");
?>
