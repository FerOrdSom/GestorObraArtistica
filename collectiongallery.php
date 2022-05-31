<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: loginview.php');
}
$collection = $_POST["selector"];
header ("Location: portalview.php?cnt=gallery&col=".$collection);
?>
