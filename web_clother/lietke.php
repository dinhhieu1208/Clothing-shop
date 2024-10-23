<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Latest compiled and minified CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    />
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Product List</title>
  </head>
  <body>
    <div class="container">
      <h2>Product List</h2>
      <table class="table">
        <thead>
          <tr>
            <th>Product ID</th>
            <th>Category</th>
            <th>Name</th>
            <th>Stock</th>
            <th>Price</th>
            <th>Description</th>
            <th>Image</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $query = "SELECT * FROM product ORDER BY Product_Name, stock, Price, description, img_path";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <td><?php echo $row['Product_id']; ?></td>
            <td><?php echo $row['category_id']; ?></td>
            <td><?php echo $row['Product_Name']; ?></td>
            <td><?php echo $row['stock']; ?></td>
            <td><?php echo $row['Price']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td> <img src="<?php echo $row['img_path']; ?>" height= "50px" width= "50px" alt="Product Image"> </td>
            <td>
            <form method="POST" action="edit.php">
              <input type="submit" value="edit">
            </form>
            </td>
            <td>
            <form method="POST" action="delete.php">
              <label for="product_id"></label>
              <input type="hidden" name="product_id" value="<?php echo $row['Product_id']; ?>">
              <input type="hidden" name="img_path" value="<?php echo $row['img_path']; ?>">
              <input type="submit" value="Delete">
            </form>
            </td>
          </tr>
          <?php
        }
        ?>
        </tbody>    
      </table>
    </div>
    </div>
  </body>
</html>