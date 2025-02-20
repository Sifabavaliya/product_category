<?php
      require_once '../includes/adminDashboard.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Badge</th>
          <th scope="col">Badge bg</th>
          <th scope="col">Image</th>
          <th scope="col">Rating</th>
          <th scope="col">Descripation</th>
          <th scope="col">Price</th>
          <th scope="col">Sale_Price</th>
          <th scope="col">Category</th>
          <th scope="col" colspan="2">Oprations</th>
        </tr>
      </thead>
        <?php foreach ($rows as $row): ?>
        <tr>
          <th scope="row"><?= $row['id']; ?></th>
          <td><?= $row['label']; ?></td>
          <td><?= $row['label_bg']; ?></td>
          <td class="img-dash"><img src="<?= $row['image']; ?>" alt=""></td>
          <td><?= $row['rating']; ?></td>
          <td><?= $row['descripation']; ?></td>
          <td><?= $row['price']; ?></td>
          <td><?= $row['sale_price']; ?></td>
          <td><?= $row['category']; ?></td>
          <td><a class="btn btn-primary" href="add_product.php?id=<?= $row['id']; ?>" role="button">EDIT</a></td>
          <td><a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row['id']; ?>" role="button">DELETE</a></td>
          <!-- Modal -->
          <div class="modal fade" id="deleteModal<?= $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $row['id']; ?>" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteModalLabel<?= $row['id']; ?>">Confirm</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Do you really want to delete <b><?= $row['name']; ?></b> (ID: <b><?= $row['id']; ?></b>)?</p>
                </div>
                <div class="modal-footer">
                  <form action="" method="post">
                  <input type="hidden" name="delete_id" value="<?= $row['id']; ?>">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <input type="submit" name="yes" class="btn btn-danger" value="Yes">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </tr>
        <?php endforeach; ?>
      </table>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>