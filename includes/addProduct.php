<?php
    require_once '../includes/database.php';
    require_once '../includes/product.php';
    require_once '../includes/nav.php';

    $db = new Database();
    $product = new Product($db);

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $name = $price = $sale_price = $category = $image = $descripation = $rating = $label = $label_bg = '';
    $btn_text = "Add Product";
     
    if (!empty($id)) {
      $btn_text = "Update Product";
      $row = $product->getproductsbyid($id);
      if ($row) {
          $name = $row['name'] ?? '';
          $price = $row['price'] ?? '';
          $sale_price = $row['sale_price'] ?? '';
          $category = $row['category']  ?? '';
          $image = $row['image']  ?? '';
          $descripation = $row['descripation'] ?? '';
          $rating = $row['rating'] ?? '';
          $label = $row['label'] ?? '';
          $label_bg = $row['label_bg'] ?? '';
      }
  }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $sale_price = $_POST['sale_price'];
        $rating = $_POST['rating'];
        $label = $_POST['label'];
        $label_bg = $_POST['label_bg'];
        if (!empty($_FILES['image']['name'])) {
          $image = '../assets/image/' . basename($_FILES['image']['name']);
          move_uploaded_file($_FILES['image']['tmp_name'], $image);
        } elseif (!empty($_POST['id'])) {
          $row = $product->getproductsbyid($_POST['id']);
          $image = $row['image'];
        }
      
        $descripation=$_POST['descripation'];

        if (!empty($id)) {
          if ($product->updateproduct($id, $name, $price, $sale_price, $category, $image, $descripation, $rating, $label, $label_bg)) {
            header("Location: admin_dashboard.php");
          } else {
              echo "Failed to update product.";
          }
      } else {
          if ($product->addproduct($name, $price, $sale_price, $category, $image, $descripation, $rating, $label, $label_bg)) {
            header("Location: admin_dashboard.php");
          } else {
              echo "Failed to add product.";
          }
      }
    }
?>