<!-- <form action="upload.php" method="post" enctype="multipart/form-data">
  <label for="img_upload">+</label>
  <input id="img_upload" type="file" name="my_image" style="display: none;">
  <input type="submit" name="submit" value="upload ">
</form> -->
<?php
require_once "Model.php";
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: loginview.php');
}
if(isset($_POST["submit"]) && isset($_FILES["my_image"]) && !isset($_GET["col"])){
  $collection = $_POST["selector"];
  echo "dev info: ".$collection."=id de coleccion seleccionada<br>";
  $cwd = getcwd();//get root directory

  $file_name =  $_FILES["my_image"]["name"];
  $work_name = substr($file_name, 0, strrpos($file_name, '.'));//name of work
  echo $work_name."<br>";

  $tmp_name= $_FILES["my_image"]["tmp_name"];
  $img_name = uniqid("img-");
  move_uploaded_file($tmp_name,$cwd."/src/img/".$img_name.".jpg");

  $url= "src/img/".$img_name.".jpg";//value of url
  echo $url;

  Model::create_work($collection, $work_name, $url);

  header("Location: portalview.php?cnt=gallery");
}elseif (isset($_GET["col"])){
  header("Location: portalview.php?cnt=gallery&col=".$_GET["col"]);

}


?>
