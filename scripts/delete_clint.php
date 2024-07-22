<?php

include "../dbconnect.php";
include "signup_contr.inc.php";
include "signup_model.php";

function checkAndRedirect($data, $redirectLocation)
{
    if (!$data) {
        header("Location: " . $redirectLocation);
        exit();
    }
}

function deleteClient($db)
{
    if (isset($_GET['id'])) {
        $client_id = $_GET['id'];

        $result = $db->prepare("SELECT * FROM client WHERE id = :ID");
        $result->bindParam(':ID', $client_id);
        $result->execute();
        $clientData = $result->fetch(PDO::FETCH_ASSOC);

        checkAndRedirect($clientData, "../shw-all-client.php");

        $deleteQuery = $db->prepare("DELETE FROM client WHERE id = :ID");
        $deleteQuery->bindParam(':ID', $client_id);
        $deleteQuery->execute();

        header("Location: ../shw-all-client.php");
        exit();
    } else {
        echo "Client ID is missing.";
        exit();
    }
}

function deleteadmins($db)
{
    if (isset($_GET['id'])) {
        $admins_id = $_GET['id'];

        $result = $db->prepare("SELECT * FROM admins WHERE id = :id");
        $result->bindParam(':id', $admins_id);
        $result->execute();
        $adminData = $result->fetch(PDO::FETCH_ASSOC);

        checkAndRedirect($adminData, "../supervisor.php");

        $deleteQuery = $db->prepare("DELETE FROM admins WHERE id = :id");
        $deleteQuery->bindParam(':id', $admins_id);
        $deleteQuery->execute();

        header("Location: ../supervisor.php");
        exit();
    } else {
        echo "Admin ID is missing.";
        exit();
    }
}

if (isset($_POST['Delete'])) {
    deleteadmins($db);
    deleteClient($db);
}
?>
