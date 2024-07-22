<?php
include_once "./dbconnect.php";
include_once "./scripts/signup_contr.inc.php";
include_once "./scripts/signup_model.php";
require_once "./scripts/config_session.php";

if (!isset($_SESSION['id'])) {
    header('Location:./count-prod-per-cat.php');
    exit; 
}

$query = $db->prepare("SELECT client.id, 
                              client.first_name, 
                              client.last_name, 
                              client.city, 
                              client.country, 
                              purchase.purchasedate, 
                              COUNT(purchase.ID) AS totpurchases 
                        FROM client
                        LEFT JOIN purchase ON client.id = purchase.clientid
                        WHERE client.id = :user_id
                        GROUP BY client.id, client.first_name, client.last_name, client.city, client.country, purchase.purchasedate
                        ORDER BY purchase.purchasedate DESC;");

$query->bindParam(':user_id', $_SESSION['id'], PDO::PARAM_INT);
$query->execute();
$resultq = $query->fetchAll(PDO::FETCH_ASSOC);

if ($query->rowCount() == 0) {
    echo "<h2>Er zijn géén gegevens gevonden voor deze informatie.<br>Log in om uw bestellingen te bekijken</h2>";
    echo "<div class='form-container'>
                <h1>
                    <a href=''><span class='aanmaken'>Account aanmaken</span></a> &nbsp; &nbsp;
                    <a href='signup.php'><span class='login'>Inloggen</span></a>
                </h1><br>
            </div>";
    exit; 
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Bread Company</title>
    <link rel="stylesheet" type="text/css" href="./company.css">
</head>
<body>
    <header>
        <?php include "nav_cli.html"; ?>
    </header>
    <main class="flexverticalcenter">
     <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Klant-nr</th>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Purchasedate</th>
                    <th>Stad</th>
                    <th>Land</th>
                    <th>Aantal aankopen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultq as $data): ?>
                    <tr>
                        <td><?php echo $data["id"]; ?></td>
                        <td><?php echo $data["first_name"]; ?></td>
                        <td><?php echo $data["last_name"]; ?></td>
                        <td><?php echo $data["purchasedate"]; ?></td>
                        <td><?php echo $data["city"]; ?></td>
                        <td><?php echo $data["country"]; ?></td>
                        <td class='centercell'><?php echo $data["totpurchases"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <div class="gap"></div>
    <footer>
        <?php include "footer.html"; ?>
    </footer>
    <script src="./index.js"></script>
</body>



