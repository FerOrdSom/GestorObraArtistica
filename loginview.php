<?php
require_once "view.php";
require_once "controller.php";
echo View::get_head();
echo View::get_login_view();
echo View::get_foot();
Controller::login();
?>
