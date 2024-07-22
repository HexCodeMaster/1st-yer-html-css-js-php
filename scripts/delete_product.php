<?php

include "../dbconnect.php";
include "signup_contr.inc.php";
include "signup_model.php";

function deleteProduct($db)
{
    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];

        // Check if the product exists
        $result = $db->prepare("SELECT * FROM product WHERE ID = :ID");
        $result->bindParam(':ID', $product_id);
        $result->execute();
        $productData = $result->fetch(PDO::FETCH_ASSOC);

        if (!$productData) {
            header("Location: C:/xampp/htdocs/php/shw-purchdet-per-prod.php"); 
            exit();
        }

       
        $deleteQuery = $db->prepare("DELETE FROM product WHERE ID = :ID");
        $deleteQuery->bindParam(':ID', $product_id);
        $deleteQuery->execute();
        
        header("Location: ../shw-all-product.php");
        exit();
    } else {
        echo "Product ID is missing.";
        exit();
    }
}


if (isset($_POST['Delete'])) {
    deleteProduct($db);
}


?>


