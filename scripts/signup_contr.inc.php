<?php

// Checks if any of the input values are empty
function is_input_empty(string $first_name, string $last_name, string $email, string $password, string $adress, string $zipcode, string $city, string $state, string $country, string $telephone, string $herhalPassword){
    return empty($first_name) || empty($last_name) || empty($email) || empty ($herhalPassword) || empty($password) || empty($adress) || empty($zipcode) || empty($city) || empty($state) || empty($country) || empty($telephone);
}

// Checks if two password strings match after filtering special characters
function check_all_input(string $password, string $herhalPassword){
    $validPassword = filter_var($password, FILTER_SANITIZE_SPECIAL_CHARS);
    $validherhalPassword = filter_var($herhalPassword, FILTER_SANITIZE_SPECIAL_CHARS);

    return $validPassword ===  $validherhalPassword ;
}

// Checks if an email already exists in the database
function check_email_existence(object $db, string $email){
    $stmt = $db->prepare("SELECT * FROM client WHERE email = ?");
    $stmt->execute([$email]);
    $result = $stmt->fetch(); 

    return $result;
}

// Creates a new client record in the database
function create_client($first_name,  $last_name,  $email,  $password,  $adress,  $zipcode,  $city,  $state,  $country,  $telephone) {
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

    $query = "INSERT INTO client (first_name, last_name, email, password, adress, zipcode, city, state, country, telephone) VALUES (:first_name, :last_name, :email, :password, :adress, :zipcode, :city, :state, :country, :telephone)";
  
    global $db; 
    $stmt = $db->prepare($query);

    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':adress', $adress);
    $stmt->bindParam(':zipcode', $zipcode);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':state', $state);
    $stmt->bindParam(':country', $country);
    $stmt->bindParam(':telephone', $telephone);

    $stmt->execute();
}

?>
