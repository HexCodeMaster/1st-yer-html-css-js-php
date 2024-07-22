<?php
include "../dbconnect.php";
include "signup_contr.inc.php";
include "signup_model.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Wijzig'])) {

    if (isset($_GET['id'])) {
        $client_id = $_GET['id'];

        $result = $db->prepare("SELECT * FROM admins WHERE id = :id");
        $result->bindParam(':id', $client_id);
        $result->execute();
        $clientData = $result->fetch(PDO::FETCH_ASSOC);

        if (!$clientData) {
            echo "Client data not found for ID: " . $client_id;
            header("Location: ../supervisor.php");
            exit();
        }

        $username = $clientData["username"];
        $email = $clientData["email"];
        $usertype = $clientData["usertype"];

       
        $updatedusername = isset($_POST["username"]) && !empty($_POST["username"]) ? $_POST["username"] : $username;
        $updatedEmail = $_POST["email"];  
        $updatedusertype = isset($_POST["usertype"]) ? $_POST["usertype"] : $usertype;

        $updateQuery = $db->prepare("UPDATE admins SET 
            username = :username,
            email = :email,
            usertype = :usertype
            WHERE id = :id");

        $updateQuery->bindParam(':username', $updatedusername);
        $updateQuery->bindParam(':email', $updatedEmail);
        $updateQuery->bindParam(':usertype', $updatedusertype);
        $updateQuery->bindParam(':id', $client_id);

        try {
            if ($updateQuery->execute()) {
                echo "Update successful!";
                header("Location: ../supervisor.php");
            } else {
                echo "Update failed!";
                print_r($updateQuery->errorInfo());
            }
        } catch (PDOException $e) {
            echo "PDO Exception: " . $e->getMessage();
        }
    } else {
        echo "Client ID is missing.";
        exit();
    }
}
?>
