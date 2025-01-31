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
      $row = $product->getProductsById($id);
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
          $row = $product->getProductsById($_POST['id']);
          $image = $row['image'];
        }
      
        $descripation=$_POST['descripation'];

        if (!empty($id)) {
          if ($product->updateProduct($id, $name, $price, $sale_price, $category, $image, $descripation, $rating, $label, $label_bg)) {
            header("Location: admin_dashboard.php");
          } else {
              echo "Failed to update product.";
          }
      } else {
          if ($product->addProduct($name, $price, $sale_price, $category, $image, $descripation, $rating, $label, $label_bg)) {
            header("Location: admin_dashboard.php");
          } else {
              echo "Failed to add product.";
          }
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <!-- <h2>Add Product</h2> -->
        <form class="form" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Product Name:</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Product name..." name="name" required value="<?php echo $name; ?>">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput2" class="form-label">Product Category:</label>
              <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Product Category" name="category" required value="<?php echo $category; ?>">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput3" class="form-label">Product Price:</label>
              <input type="number" class="form-control" id="exampleFormControlInput3" placeholder="Product Price" name="price" step="0.01" required value="<?php echo $price; ?>">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput4" class="form-label">Product Sale Price:</label>
              <input type="number" class="form-control" id="exampleFormControlInput4" placeholder="Product Sale Price" name="sale_price" step="0.01" value="<?php echo $sale_price; ?>">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput5" class="form-label">Product Rating:</label>
              <input type="number" class="form-control" id="exampleFormControlInput5" placeholder="Product Rating" min="1" max="5" name="rating"  required value="<?php echo $rating; ?>">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput6" class="form-label">Product Label:</label>
              <input type="text" class="form-control" id="exampleFormControlInput6" placeholder="Product Label"  name="label" value="<?php echo $label; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleColorInput" class="form-label">Choose your color For label</label>
                <input type="color" class="form-control form-control-color" id="exampleColorInput" name="label_bg" title="Choose your color For label" value="<?php echo $label_bg; ?>">
            </div>
            <div class="mb-3">
              <label for="formFile" class="form-label">Image</label>
              <input class="form-control" type="file" id="formFile" name="image">
            </div>
            <?php if (!empty($id) && !empty($image)) : ?>
              <div class="mb-3">
                <label class="form-label">Current Image:</label>
                <img src="<?php echo $image; ?>" alt="Product Image" style="max-width: 150px; display: block;">
              </div>
            <?php endif; ?>

            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Product Descripation</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripation"><?php echo $descripation; ?></textarea>
            </div>
            <a class="btn  btn-outline-secondary" href="admin_dashboard.php" role="button">cancle</a>
            <input class="btn  btn-outline-secondary" type="reset" value="Reset">
            <input class="btn  btn-outline-secondary" type="submit" value="<?= $btn_text ?>">
        </form>
    </div>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>