<?php
declare(strict_types=1);



function get_username(PDO $db, string $username, string $email) {
    require_once "../dbconnect.php";
    $query = "SELECT username, email FROM USERS WHERE username = :username AND email = :email";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Fetch the result as an associative array
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result; // Return the result of the query
}


?>