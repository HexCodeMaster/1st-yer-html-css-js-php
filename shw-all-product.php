<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./css/product.css">
  <title>Product Catalog</title>
</head>
<body>
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
<header id="navBox">
<?php include "nav_super.html"; ?>
</header>
<form method="get">

  <select class="button-edit ed" name="status" id="status">
    <option class="button-edit ed" value="active" <?php if ($statusFilter === 'active') echo 'selected'; ?>>Active</option>
    <option value="inactive" <?php if ($statusFilter === 'inactive') echo 'selected'; ?>>Inactive</option>
  </select>
  <button class="button-edit ed" type="submit">Filter</button>
</form>
<div class="container">
    <div class="row">
        <div class="col m-auto">
            <div class="card mt-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Ingredients</th>
                            <th>Allergens</th>
                            <th>Price</th>
                            <th>Category ID</th>
                            <th>Supplier ID</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo $product['ID']; ?></td>
                            <td><?php echo $product['productname']; ?></td>
                            <td><?php echo $product['ingredients']; ?></td>
                            <td><?php echo $product['allergens']; ?></td>
                            <td><?php echo $product['price']; ?></td>
                            <td><?php echo $product['categoryid']; ?></td>
                            <td><?php echo $product['supplierid']; ?></td>
                            <td><?php echo $product['status']; ?></td>
                            <td>
                                <a href="#" class="button-edit ed" title="Edit Product" onclick="showTooltip('tooltipContent<?php echo $product['ID']; ?>')">Edit</a>
                                <div id="tooltipContent<?php echo $product['ID']; ?>" class="tooltip" style="display: none;">
                                    <form method="POST" action="./scripts/edit_product.php?id=<?php echo $product['ID']; ?>">
                                        <table class='table table-bordered'>
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Ingredients</th>
                                                    <th>Allergens</th>
                                                    <th>Price</th>
                                                    <th>Category ID</th>
                                                    <th>Supplier ID</th>
                                                    <th>Status</th>
                                                    <th>Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" name="productname" value="<?php echo $product['productname']; ?>"></td>
                                                    <td><input type="text" name="ingredients" value="<?php echo $product['ingredients']; ?>"></td>
                                                    <td><input type="text" name="allergens" value="<?php echo $product['allergens']; ?>"></td>
                                                    <td><input type="text" name="price" value="<?php echo $product['price']; ?>"></td>
                                                    <td><input type="text" name="categoryid" value="<?php echo $product['categoryid']; ?>"></td>
                                                    <td><input type="text" name="supplierid" value="<?php echo $product['supplierid']; ?>"></td>
                                                    <td>
                                                        <select name="status">
                                                            <option value="active" <?php echo ($product['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                                                            <option value="inactive" <?php echo ($product['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="submit" class="button-edit ed" name="Wijzig" value="Wijzig"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </td>
                            <td>
                                <form method="POST" action="./scripts/delete_product.php?id=<?php echo $product['ID']; ?>">
                                    <input type="hidden" name="id" value="<?php echo $product['ID']; ?>">
                                    <input type="submit" class="button-delete de" name="Delete" onclick="return confirm('Are you sure you want to delete this item?')" value="Delete">
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<footer>
    <?php include "footer.html"; ?>
</footer>
<script src="./index.js"></script>
</body>
</html>
