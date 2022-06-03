<?php
require_once "Model.php";
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: loginview.php');
}
$url = $_GET["url"];
$pic_id = Model::get_work_id($url);
Model::set_record($_POST["title"],
                        $_POST["author"],
                        $_POST["technique"],
                        $_POST["width"],
                        $_POST["height"],
                        $_POST["year"],
                        $_POST["description"],
                        $_POST["commentary"],
                        $pic_id);
header ("Location: portalview.php?cnt=records&url=".$url."");
 ?>
