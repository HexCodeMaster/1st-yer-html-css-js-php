<?php
include "../dbconnect.php";
include "signup_contr.inc.php";
include "signup_model.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Wijzig'])) {

    if (isset($_GET['id'])) {
        $client_id = $_GET['id'];


        $result = $db->prepare("SELECT * FROM client WHERE id = :id");
        $result->bindParam(':id', $client_id);
        $result->execute();
        $clientData = $result->fetch(PDO::FETCH_ASSOC);

        if (!$clientData) {
            echo "Client data not found for ID: " . $client_id;
            header("Location: ../shw-client.php");
            exit();
        }

        $first_name = $clientData["first_name"];
        $last_name = $clientData["last_name"];
        $email = $clientData["email"];
        $adress = $clientData["adress"];
        $zipcode = $clientData["zipcode"];
        $city = $clientData["city"];
        $state = $clientData["state"];
        $country = $clientData["country"];
        $telephone = $clientData["telephone"];

        $updatedFirstName = $_POST['first_name'];
        $updatedLastName = $_POST['last_name'];
        $updatedEmail = $_POST['email'];
        $updatedAdress = $_POST['adress'];
        $updatedZipcode = $_POST['zipcode'];
        $updatedCity = $_POST['city'];
        $updatedState = $_POST['state'];
        $updatedCountry = $_POST['country'];
        $updatedTelephone = $_POST['telephone'];

    
        $updateQuery = $db->prepare("UPDATE client SET 
            first_name = :first_name,
            last_name = :last_name,
            email = :email,
            adress = :adress,
            zipcode = :zipcode,
            city = :city,
            state = :state,
            country = :country,
            telephone = :telephone
            WHERE id = :id");

        $updateQuery->bindParam(':first_name', $updatedFirstName);
        $updateQuery->bindParam(':last_name', $updatedLastName);
        $updateQuery->bindParam(':email', $updatedEmail);
        $updateQuery->bindParam(':adress', $updatedAdress);
        $updateQuery->bindParam(':zipcode', $updatedZipcode);
        $updateQuery->bindParam(':city', $updatedCity);
        $updateQuery->bindParam(':state', $updatedState);
        $updateQuery->bindParam(':country', $updatedCountry);
        $updateQuery->bindParam(':telephone', $updatedTelephone);
        $updateQuery->bindParam(':id', $client_id);
  
        if ($updateQuery->execute()) {
            echo "Update successful!";
        } else {
            echo "Update failed!";
            print_r($updateQuery->errorInfo());
        }

 
        header("Location: ../shw-all-client.php");
        exit();
    } else {
    
        echo "Client ID is missing.";
        exit();
    }
}
?>
