<?php
require_once "model.php";
Model::read_users();
$result = Model::login("userhash");
echo "### result of Model.login(\"userhash\")<br>";
echo $result["username"]."<br>";
echo $result["userpass"]."<br>";
 ?>
