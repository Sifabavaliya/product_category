<?php
    require_once '../includes/database.php';
    require_once '../includes/admin.php';
    require_once '../includes/product.php';
    require_once '../includes/nav.php';

    $db = new Database();
    $product = new Product($db);

    $rows = $product -> getallproduct();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_id'])) {
      $id = $_POST['delete_id'];
      if ($product->deleteproduct($id)) {
          echo "<script>alert('Product deleted successfully!'); window.location.href='admin_dashboard.php';</script>";
      } else {
          echo "<script>alert('Failed to delete product');</script>";
      }
  }
  
?>