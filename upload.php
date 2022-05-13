<form action="upload.php" method="post" enctype="multipart/form-data">
  <label for="img_upload">+</label>
  <input id="img_upload" type="file" name="my_image" style="display: none;">
  <input type="submit" name="submit" value="upload ">
</form>
<?php

if(isset($_POST["submit"]) && isset($_FILES["my_image"])){
  echo "dev info: imagen cargada <br>";
  echo "dev info: submit value = ".$_POST["submit"]."<br>";
  echo "dev info: ";
  $cwd = getcwd();
  echo $cwd."<br>";
  print_r($_FILES["my_image"]);
  echo "<br>";
  $tmp_name= $_FILES["my_image"]["tmp_name"];
  move_uploaded_file($tmp_name,$cwd."\src\img\archivo1.png");
  echo uniqid("img-");
}


?>
