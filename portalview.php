<?php
require_once "view.php";
require_once "controller.php";
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: loginview.php');
}
?>
<?php

$content = Controller::get_content();
echo View::get_head();
echo View::get_portal_view($content);
echo View::get_foot();
Controller::get_action();

?>
