<?php

  require_once 'database.php';
  require_once 'admin.php';
  require_once 'product.php';
  require_once 'nav.php';

  $db = new Database();
  $admin= new Admin($db);
  

  if (!$admin->isloggedin()) {
    header("Location: ./admin_login.php");
    exit();
  }

  if (isset($_POST['logout'])) {
    $admin->logout();
  }
?>
