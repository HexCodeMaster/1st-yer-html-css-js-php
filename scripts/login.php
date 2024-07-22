<?php
declare(strict_types=1);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    require "../dbconnect.php";

    $stmt_client = $db->prepare("SELECT id, last_name, email FROM client WHERE email = ? AND password = ?");
    $stmt_client->execute([$email, $password]);
    $client = $stmt_client->fetch(PDO::FETCH_ASSOC);

    $stmt_admins = $db->prepare("SELECT id, email, username,password FROM admins WHERE email = ? AND password  = ?");
    $stmt_admins->execute([$email, $password]);
    $admin = $stmt_admins->fetch(PDO::FETCH_ASSOC);

    $stmt_supervisor = $db->prepare("SELECT id, email,username, password FROM supervisor WHERE email = ? AND password  = ?");
    $stmt_supervisor->execute([$email, $password]);
    $supervisor = $stmt_supervisor->fetch(PDO::FETCH_ASSOC);

    if ($client) { 
        session_start();
        $_SESSION['id'] = $client['id'];
        $_SESSION['user_id'] = $client['last_name'];
        $_SESSION['email'] = $client['email'];
        header('Location: sucess.cli.php?welcome ' . $_SESSION['user_id']);
        exit();
    } elseif ($supervisor) {
        session_start();
        $_SESSION['username'] = $supervisor['username'];
        $_SESSION['user_id'] = $supervisor['id'];
        $_SESSION['email'] = $supervisor['email'];
        header('Location: sucess.php?loginP=SUCCESS&' . $_SESSION['id']);
        exit();
    } elseif ($admin) {
        session_start();
        $_SESSION['user_id'] = $admin['id'];
        $_SESSION['username'] = $admin['username'];
        $_SESSION['email'] = $admin['email'];
        
        // Add specific redirection for admin
        header('Location:sucess.admin.php?welcome '. $_SESSION['id'] );
        exit();
    } else {
        session_start();
        $_SESSION["errors_login"] = ['Invalid email or password.'];
        header('Location: ../home.php');
        exit();
    }
}
?>
