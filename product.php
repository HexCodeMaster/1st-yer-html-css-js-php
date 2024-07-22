<?php
include "./dbconnect.php";
include "./scripts/signup_contr.inc.php";
include "./scripts/signup_model.php";
$statusFilter = isset($_GET['status']) ? $_GET['status'] : 'active'; 
$stmt = $db->prepare("SELECT * FROM product WHERE status = :status");
$stmt->bindParam(':status', $statusFilter);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./css/product.css">
  <title>Product Catalog</title>
</head>
<body>
<header id="navBox">

<!-- Include navigation menu -->
<?php include "front_nav.html"; ?>
</header>


<form method="get">
  <label for="status">Select Status:</label>
  <select name="status" id="status">
    <option value="active" <?php if ($statusFilter === 'active') echo 'selected'; ?>>Active</option>
    <option value="inactive" <?php if ($statusFilter === 'inactive') echo 'selected'; ?>>Inactive</option>
  </select>
  <button type="submit">Filter</button>
</form>


<?php foreach ($products as $product): ?>
  <section class="product-card">
    <div class="product-image" style="background-image: url('./images/bread033.jpg');"></div>
    <div class="product-details">
      <div class="product-title"><?php echo $product['productname']; ?></div>
      <div class="product-description"><?php echo $product['ingredients']; ?></div>
      <div class="product-price">Price: $<?php echo $product['price']; ?></div>
      <form method="post">
        <div class="add-to-cart" onclick="addToCart(<?php echo $product['ID']; ?>)">Add to Cart 
          <input type="hidden" name="productId" value="<?php echo $product['ID']; ?>">
          <input class="add-to-cart" type="submit" name="addToCart" value="+">
        </div>
      </form>
    </div>
  </section>
<?php endforeach; ?>

<script>
  function addToCart(productId) {
    alert('Product added to cart! Product ID: ' + productId);
  }
</script>

<footer>
  <?php include "footer.html"; ?>
</footer>
<script src="./index.js"></script>
</body>
</html>
