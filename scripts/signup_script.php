<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $adress = $_POST["adress"];
    $zipcode = $_POST["zipcode"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $country = $_POST["country"];
    $telephone = $_POST["telephone"];
    $herhalPassword = $_POST["herhalPassword"] ?? '';
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $hashedEmail = hash('sha256', $email);

    try {
        require_once "../dbconnect.php"; // Co C:\xampp\htdocs\php\dbconnect.php
        require_once "./signup_model.php"; // Co C:\xampp\htdocs\php\scripts\signup_model.php
        require_once "signup_view.inc.php"; // Co C:\xampp\htdocs\php\scripts\signup_view.inc.php
        require_once "signup_contr.inc.php"; // C:\xampp\htdocs\php\scripts\signup_contr.php
        
        
    
        echo "Debug: Entered try block.";

        $errors = [];

        if (is_input_empty($first_name, $last_name, $email, $password,$herhalPassword, $adress, $zipcode, $city, $state, $country, $telephone)) {
            $errors['empty_input'] = "Please fill out all fields.";
        }

        if (!check_all_input($password,$herhalPassword)) {
            $errors['invalid_input'] = "Invalid input format or passwords do not match.";
        }

        if (check_email_existence($db, $email)) {
            $errors['email_exist'] = "Email already exists.";
        }

        
        var_dump($errors); 
        echo "Debug: Finished validation.";

        if (!empty($errors)) {
            session_start();
            $_SESSION["errors_signup"] = $errors;
            header('Location:../signup.php');
            die();
        }
        
        create_client($first_name, $last_name, $email, $password, $adress, $zipcode, $city, $state, $country, $telephone);
    
    
        echo " User created successfully.";

        header('Location: sucess.cli.php?welcome ');
        exit();
        
    } catch (PDOException $e) {
     
        echo "Debug: Exception caught - " . $e->getMessage();
        die('Something went wrong. Please try again later.');
    }
} else {

    exit;
}
?>

