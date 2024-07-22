<?php
include "../dbconnect.php";
include "signup_contr.inc.php";
include "signup_model.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Wijzig'])) {


    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];

        $result = $db->prepare("SELECT * FROM product WHERE ID = :ID");
        $result->bindParam(':ID', $product_id);
        $result->execute();
        $productData = $result->fetch(PDO::FETCH_ASSOC);

      
        if (!$productData) {
            echo "Product data not found for ID: " . $product_id;
            header("Location: ../home.php");
            exit();
           
        }

        $productname = $productData["productname"];
        $ingredients = $productData["ingredients"];
        $allergens = $productData["allergens"];
        $price = $productData["price"];
        $categoryid = $productData["categoryid"];
        $status = $productData["status"];

   
        $updatedProductName = $_POST['productname'];
        $updatedIngredients = $_POST['ingredients'];
        $updatedAllergens = $_POST['allergens'];
        $updatedPrice = $_POST['price'];
        $updatedCategoryId = $_POST['categoryid'];
        $updatedstatus = $_POST['status'];

    
        echo "Fetched Data: ";
        var_dump($productData);
        echo "Updated Data: ";
        var_dump($_POST);

        $updateQuery = $db->prepare("UPDATE product SET 
            productname = :productname,
            ingredients = :ingredients,
            allergens = :allergens,
            price = :price,
            categoryid = :categoryid,
            status = :status
            WHERE ID = :ID");

        $updateQuery->bindParam(':productname', $updatedProductName);
        $updateQuery->bindParam(':ingredients', $updatedIngredients);
        $updateQuery->bindParam(':allergens', $updatedAllergens);
        $updateQuery->bindParam(':price', $updatedPrice);
        $updateQuery->bindParam(':categoryid', $updatedCategoryId);
        $updateQuery->bindParam(':status', $updatedstatus);
        $updateQuery->bindParam(':ID', $product_id);

        echo "SQL Query: ";
        echo $updateQuery->queryString;

  
        if ($updateQuery->execute()) {
            echo "Update successful!";
        } else {
            echo "Update failed!";
            print_r($updateQuery->errorInfo());
        }
        
        header("Location: ../shw-all-product.php"); 
        exit();
    } else {
      
        echo "Product ID is missing.";
        exit();
    }
}
