<?php
include "./dbconnect.php";
include "./scripts/signup_contr.inc.php";
include "./scripts/signup_model.php";
require_once "./scripts/config_session.php";
include_once "./dbconnect.php";




?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Nathanial">
    <meta name="school" content="School JS Opdracht">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="icon" href="./pbl.svg" type="image/svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Bread Company</title>
</head>

<body>
    <header id="navBox">

        <!-- hieronder wordt het menu opgehaald. -->
        <?php

        include "front_nav.html";
        ?>
    </header>

    <!-- op de home pagina wat enthousiaste tekst over het bedrijf en de producten -->
    <main class="flexverticalcenter">
        <div class="wrapper">
           <h2> <svg>
                <text x="30%" y="50%" dy=".35em" text-anchor="middle"> Bread Company&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </text>
            </svg></h2>
        </div>

        <p>
            U heeft aangegeven een compliment te willen geven over onze website. Uiteraard zijn wij daar erg
            blij mee. Wilt u onderstaand wat gegevens invullen en precies vertellen wat u goed vindt aan de
            website?
        </p>

    </main>
    <footer>
        <br><br><br><br><br><br><br><br><br><br><br>

        <?php

        include "footer.html";
        ?>
    </footer>
    <script src="./index.js"></script>

</body>

</html>