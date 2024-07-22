<?php
ob_start();
include_once "./dbconnect.php";
include_once "./scripts/signup_contr.inc.php";
include_once "./scripts/signup_model.php";
require_once "./scripts/config_session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>

    <header id="navBox">
        <?php include "nav_super.html"; ?>
    </header>
    <form method="get" action="catagory.php">
        <select class="button-edit de" name="status" id="status">
            <option value="0" <?php if (isset($_GET['status']) && $_GET['status'] === '1') echo 'selected'; ?>>Delivered</option>
            <option value="1" <?php if (isset($_GET['status']) && $_GET['status'] === '0') echo 'selected'; ?>>Not Delivered</option>
        </select>
        <button class="button-delete de" type="submit">Filter</button>
    </form>

    <div class="container">
        <div class="row">
            <div class="col m-auto">
                <div class="card mt-5">
                 
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> ID</th>
                                <th>Product Name</th>
                                <th>Category Name</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            try {
                                $statusCondition = isset($_GET['status']) ? ($_GET['status'] === '1' ? 0 : 1) : null;

                                $sql = "SELECT DISTINCT product.categoryid AS ID, product.productname, category.name AS name, purchaseline.purchaseid AS P_ID
            FROM product 
            INNER JOIN purchaseline ON product.ID = purchaseline.productid 
            INNER JOIN purchase ON purchaseline.purchaseid = purchase.ID 
            LEFT JOIN category ON product.categoryid = category.ID
            WHERE purchase.delivered = ?";

                                $stmt = $db->prepare($sql);
                                $stmt->bindParam(1, $statusCondition, PDO::PARAM_INT);
                                $stmt->execute();

                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {


                            ?>

                                    <tr>
                                        <td><?php echo $row['P_ID']; ?></td>
                                        <td><?php echo $row['productname']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td>
                                            <form method="post" action="">
                                                <input type="hidden" name="purchaseid" value="<?php echo $row['P_ID']; ?>">
                                                <input type="submit" class="button-delete de" name="Delete" onclick="return confirm('Are you sure you want to delete this item?')" value="Delete">
                                            </form>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } catch (PDOException $e) {
                                echo 'Error: ' . $e->getMessage();
                            }
                            ?>
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

    <?php
    include_once "./scripts/signup_contr.inc.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['purchaseid'])) {
        $purchaseID = $_POST['purchaseid'];

        try {
            $stm = $db->prepare("SELECT delivered FROM purchase WHERE ID = :purchaseID");
            $stm->bindParam(':purchaseID', $purchaseID);
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);

            if ($result && $result['delivered'] == 0) {
                $deleteQuery = $db->prepare("DELETE FROM purchase WHERE ID = :purchaseID");
                $deleteQuery->bindParam(':purchaseID', $purchaseID);
                $deleteQuery->execute();
                $_SESSION['delete'] = true;
                header("Location: {$_SERVER['PHP_SELF']}");
                exit();
            } else {
                $_SESSION['delete'] = false;
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    ?>

</body>

</html>