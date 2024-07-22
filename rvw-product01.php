<?php
include "./dbconnect.php";
include "./scripts/signup_contr.inc.php";
include "./scripts/signup_model.php";
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

<!-- hieronder wordt het menu opgehaald. -->
<?php

include "nav.html";
?>
</header><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php
$stmt = $db->prepare("SELECT * FROM product");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach ($products as $product): ?>
  <section class="product-card">
    <div class="product-image" style="background-image: url('./images/bread033.jpg');"></div>
    <div class="product-details">
      <div class="product-title"><?php echo $product['productname']; ?></div>
      <div class="product-description"><?php echo $product['ingredients']; ?></div>
      <div class="product-price">Price: $<?php echo $product['price']; ?></div>
     <form method="post">  <div class="add-to-cart" onclick="addToCart(<?php echo $product['ID']; ?>)">Add to Cart 
                <input type="hidden" name="productId" value="<?php echo $product['ID']; ?>">
                <input class="add-to-cart"  type="submit" name="addToCart" value="+">
            </form></div>
    </div>
  </section>
<?php endforeach; ?>
<script>
  function addToCart(productId) {
  
    alert('Product added to cart! Product ID: ' + productId);
  }
</script>

<footer>
<br><br><br><br><br><br><br><br><br><br><br>

<?php

include "footer.html";
?>
</footer>
<script src="./index.js"></script>
</body>
</html>
