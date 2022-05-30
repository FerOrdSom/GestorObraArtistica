<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: loginview.php');
}
?>
<?php
require_once "view.php";
require_once "controller.php";
$content = "El contenido";
echo View::get_head();
echo View::get_portal_view($content);
echo View::get_foot();
?>
