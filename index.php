<?php
        require_once './includes/home.php';
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