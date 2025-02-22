<?php
  require_once '../includes/addProduct.php';
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