<?php
session_start();
if (isset($_SESSION['username'])) {
  $_SESSION['username'] = null;
  header('Location: loginview.php');
}
