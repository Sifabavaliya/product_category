<?php
include 'includes/database.php';
include 'includes/product.php';

$db = new Database();
$product = new Product($db);
$category = isset($_GET['category']) ? $_GET['category'] : null;
if(isset($category)){
  $products = $product->getProductsByCategory($category);
}else{
  $products = $product->getAllProduct();
}

function generateStars($rating) {
    $fullStar = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#ffff00" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>';
    $emptyStar = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/></svg>';
    
    $stars = "";
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $rating) {
            $stars .= $fullStar; // Full star
        } else {
            $stars .= $emptyStar; // Empty star
        }
    }
    return $stars;
}

function trimWords($string, $word_limit = 8) {
    $words = explode(" ", $string);
    return count($words) > $word_limit ? implode(" ", array_slice($words, 0, $word_limit)) . "..." : $string;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <div class="container">
    <header>
        <nav class="navbar navbar-expand-lg">
          <div class="container-fluid">
            <a class="navbar-brand" href="#"><strong>Computer Accessories</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="justify-content-end">
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">All Products</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="index.php?category=keyboard&mouse">Keyboards & Mouse</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?category=headphone" >Headphone</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="index.php?category=webcam">Webcam</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="index.php?category=printer">Printer</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link highlight" href="https://www.amazon.in/Computer-Accessories/b?ie=UTF8&node=1375248031" target="_blank">Browse All Products <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="orangered" d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg></a>
                </li>
              </ul>
            </div>
          </div>
          </div>
        </nav>
    </header>
    <div class="container">
        <div class="row">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $prod): ?>
                <div class="col">
                    <div class="card">
                        <div class="card-head">
                          <div class="card-img">
                          <img src="./admin/<?= $prod['image'] ?>" alt="<?= $prod['name'] ?>" class="card-img-top">
                          </div>
                            <?php if ($prod['label']): ?>
                              <span class="badge" style="background-color:<?= $prod['label_bg'] ?>; ">
                                  <?= $prod['label'] ?>
                              </span>
                             <?php endif; ?>
                        </div>
                        <div class="card-body">
                          <div class="rating">
                          <a><?= generateStars($prod['rating']) ?></a><span class="ratingcount">(0)</span>
                          </div>
                          <div class="discripation">
                          <a href="" class="link"><?= trimWords($prod['descripation'], 8) ?></a>
                          </div>
                          <div class="price">
                            <a class="price link"><?php if($prod['sale_price']){ ?>
                                <del><?php echo $prod['price']; ?></del> <span><?php echo $prod['sale_price'];?></span>
                            <?php }else{ echo $prod['price']; } ?></a>
                          </div> 
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
    </div>
    </div>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script>
      document.querySelectorAll('.ratingcount').forEach(element => {
          let randomCount = Math.floor(Math.random() * 1000); 
          element.innerText = "(" + randomCount + ")"; 
      });
    </script>

</body>
</html>