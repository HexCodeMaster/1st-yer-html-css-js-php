<?php
include "signup_contr.inc.php";
include "signup_model.php";
require_once "config_session.php";
include_once "../dbconnect.php";




?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Nathanial">
    <meta name="school" content="School JS Opdracht">

    <link rel="stylesheet" href="../css/sucess.css">
    <link rel="icon" href="./pbl.svg" type="image/svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Pong</title>
</head>

<body>
    <div class="success-message">
        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" width="10%" height="10%" viewBox="0 0 80 80">
            <circle class="circle-outline" cx="40" cy="40" r="35" fill="none" stroke="#5cb85c" stroke-width="5"
                stroke-dasharray="0,219" />
            <path class="checkmark-path" d="M25 40l8 8 18-18" fill="none" stroke="#5cb85c" stroke-width="5"
                stroke-dasharray="0,100" />
        </svg>
        <p class="success-text blink"> Success! Redirecting<span class="typing-animation"></span></p>
    </div>
    <script>
        setTimeout(function () {
            window.location.href = "../home_super.php?Welcome=<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : ''; ?>";
        }, 3000); // 5000 milliseconds = 5 seconds
    </script>
</body>

</html>

