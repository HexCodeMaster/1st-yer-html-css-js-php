<?php
include "./dbconnect.php";
include "./scripts/signup_contr.inc.php";
include "./scripts/signup_model.php";
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Bread Company</title>
    <link rel="stylesheet" type="text/css" href="company.css">
</head>

<body>
    <header>

        <!-- hieronder wordt het menu opgehaald. -->
        <?php
        session_start();
        include "nav.html";
        ?>
    </header>
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
                                <th>status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <?php
                        $result = $db->prepare("SELECT * FROM product");
                        $result->execute();

                        while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <td><?php echo $rows['ID']; ?></td>
                                <td><?php echo $rows['productname']; ?></td>
                                <td><?php echo $rows['ingredients']; ?></td>
                                <td><?php echo $rows['allergens']; ?></td>
                                <td><?php echo $rows['price']; ?></td>
                                <td><?php echo $rows['categoryid']; ?></td>
                                <td><?php echo $rows['supplierid']; ?></td>
                                <td><?php echo $rows['status']; ?></td>
                                <td>
                                    <a href="#" class="button-edit ed" title="Edit Product" onclick="showTooltip('tooltipContent<?php echo $rows['ID']; ?>')">Edit</a>
                                    <div id="tooltipContent<?php echo $rows['ID']; ?>" class="tooltip" style="display: none;">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col m-auto">
                                                    <div class="card mt-5">
                                                        <form method="POST" action="./scripts/edit_product.php?id=<?php echo $rows['ID']; ?>">
                                                            <table class='table table-bordered'>
                                                                <thead>
                                                                    <tr>
                                                                        <th>Product Name</th>
                                                                        <th>Ingredients</th>
                                                                        <th>Allergens</th>
                                                                        <th>Price</th>
                                                                        <th>Category ID</th>
                                                                        <th>Supplier ID</th>
                                                                        <th>status</th>
                                                                        <th>Edit</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>

                                                                        <td>
                                                                            <input type="text" name="productname" value="<?php echo $rows['productname']; ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="ingredients" value="<?php echo $rows['ingredients']; ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="allergens" value="<?php echo $rows['allergens']; ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="price" value="<?php echo $rows['price']; ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="categoryid" value="<?php echo $rows['categoryid']; ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="supplierid" value="<?php echo $rows['supplierid']; ?>">
                                                                        </td>
                                                                        <td>
                                                                            <select name="status">
                                                                                <option value="active" <?php echo ($rows['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                                                                                <option value="inactive" <?php echo ($rows['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                                                                            </select>
                                                                        </td>

                                                                        <td>
                                                                            <input type="submit" class="button-edit ed" name="Wijzig" value="Wijzig">
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <form method="POST" action="./scripts/delete_product.php?id=<?php echo $rows['ID']; ?>">
                                        <input type="hidden" name="id" value="<?php echo $rows['ID']; ?>">
                                        <input type="submit" class="button-delete de" name="Delete" onclick="return confirm('Are you sure you want to delete this item?')" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <footer>
        <?php

        include "footer.html";
        ?>
    </footer>
    <script src="./index.js">
    </script>
</body>

</html>