<?php
    require_once 'database.php';
    require_once 'admin.php';

    $db = (new Database())->connection;
    $admin = new Admin($db);

    if($_SERVER['REQUEST_METHOD']==='POST'){

      $username=$_POST['username']??'';
      $password = $_POST['password']??'';

      if($admin->login($username,$password)){
        $_SESSION['admin'] = $username;
        header('Location: admin_dashboard.php');
        exit();
      }
      else{
        $error = "Invalid Username or Password";
      }
    }
?>