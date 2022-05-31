<?php
require_once "model.php";
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: loginview.php');
}
$user = $_SESSION['username'];
// Model::read_users();
// $result = Model::login("monk");
// echo "### result of Model.login(\"userhash\") ###<br>";
// echo $result["username"]."<br>";
// echo $result["userpass"]."<br>";
$result = Model::get_user_profile();
echo "### result of Model.get_user_profile ###<br>";
echo $result["name"]."<br>";
echo $result["surname1"]."<br>";
echo $result["surname2"]."<br>";
echo $result["email"]."<br>";
echo $result["phone1"]."<br>";
echo $result["phone2"]."<br>";
echo $result["web"]."<br>";
echo $result["adress"]."<br>";
echo $result["img_profile"]."<br>";
echo $result["img_back"]."<br>";
echo $result["notes"]."<br>";
echo Model::get_user_collections();
$id="1";
echo Model::get_collection_works($id);
echo "#####";
$id="2";
echo Model::get_collection_works($id);
echo "#####";
$id="3";
echo Model::get_collection_works($id);
echo "#####";
 ?>
