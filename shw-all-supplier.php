<?php
include "./dbconnect.php";
include "./scripts/signup_contr.inc.php";
include "./scripts/signup_model.php";


try {
    $sql = "SELECT 
                s.ID AS supplier_id, 
                s.company AS supplier_name, 
                s.city, 
                c.name AS country_name, 
                AVG(p.price) AS average_price
            FROM 
                supplier s
            INNER JOIN 
                product p ON s.ID = p.supplierid
            INNER JOIN 
                country c ON s.countryid = c.idcountry
            GROUP BY 
                s.ID
            ORDER BY 
                average_price ASC"; 

    $stmt = $db->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {

    echo "Error: " . $e->getMessage();
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
        <!-- Menu retrieval -->
        <?php
        session_start();
        include "nav_super.html";
        ?>
    </header>
    <br><br><br><br><br><br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col m-auto">
                <div class="card mt-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Supplier ID</th>
                                <th>Supplier Name</th>
                                <th>Country Name</th>
                                <th>City</th>
                                <th>Average Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Display the results in a tabular format
                            foreach ($results as $row) {
                                echo "<tr>";
                                echo "<td>" . $row['supplier_id'] . "</td>";
                                echo "<td>" . $row['supplier_name'] . "</td>";
                                echo "<td>" . $row['country_name'] . "</td>";
                                echo "<td>" . $row['city'] . "</td>";

                                echo "<td>" . number_format($row['average_price'], 2) . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <?php
        include "footer.html";
        ?>
    </footer>
    <script src="./index.js"></script>
</body>

</html>