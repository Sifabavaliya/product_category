<?php

  require_once 'database.php';
  require_once 'admin.php';
  require_once 'product.php';
  require_once 'nav.php';

  $db = new Database();

  $admin= new Admin($db);
  

  if (!$admin->isLoggedIn()) {
    header("Location: ./admin_login.php");
    exit();
  }

  if (isset($_POST['logout'])) {
    $admin->logout();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="#"><strong>Admin Dashboard</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="justify-content-end">
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="../admin/add_product.php">Add Products</a>
                </li>
                <li class="nav-item">
                  <form action="" method="post">
                  <button type="submit" name="logout" class="nav-link">Logout</button>
                  </form>
                </li>
              </ul>
            </div>
          </div>
          </div>
        </nav>
    </header>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>