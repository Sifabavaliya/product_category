<?php
    require_once '../includes/database.php';
    require_once '../includes/admin.php';

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
     <div class="form-container">
     <main class="form-signin">
         <form method="POST">
           <h1 class="h3 mb-3 fw-normal">Admin Login</h1>
           <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
           <div class="form-floating">
             <input type="text" class="form-control" id="floatingInput" placeholder="username" name="username" required>
             <label for="floatingInput">Username</label>
           </div>
           <br/>
           <div class="form-floating">
             <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
             <label for="floatingPassword">Password</label>
            </div> 
            <br/>   
             <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
         </form>
     </main>
     </div>
    
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>