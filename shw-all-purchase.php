<?php
include "./dbconnect.php";
include "./scripts/signup_contr.inc.php";
include "./scripts/signup_model.php";
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
        include "nav.html";
        ?><br><br><br><br><br><br><br><br><br><br>
    </header><br><br><br><br><br><br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col m-auto">
                <div class="card mt-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>company</th>
                                <th>adress</th>
                                <th>streetnr</th>
                                <th>zipcode</th>
                                <th>city</th>
                                <th>state</th>
                                <th>countryid</th>
                                <th>telephone</th>
                                <th>website</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <?php
                        $result = $db->prepare("SELECT * FROM supplier");
                        $result->execute();

                        while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <td><?php echo $rows['ID']; ?></td>
                                <td><?php echo $rows['company']; ?></td>
                                <td><?php echo $rows['adress']; ?></td>
                                <td><?php echo $rows['streetnr']; ?></td>
                                <td><?php echo $rows['zipcode']; ?></td>
                                <td><?php echo $rows['city']; ?></td>
                                <td><?php echo $rows['state']; ?></td>
                                <td><?php echo $rows['countryid']; ?></td>
                                <td><?php echo $rows['telephone']; ?></td>
                                <td>
                                    <div class="website" id="tool" onclick="toggleWebsite(this)">
                                        <i class="fas fa-copy" aria-hidden="true"></i>
                                        <span class="website-info" style="display: none;"><?php echo $rows['website']; ?></span>
                                        <span class="copied-info" style="opacity: 0;">Copied!</span>
                                    </div>
                                </td>


                                <td>
                                    <a href="#" class="button-edit ed" title="Edit Supplier" onclick="showTooltip('tooltipContent<?php echo $rows['ID']; ?>')">Edit</a>
                                    <div id="tooltipContent<?php echo $rows['ID']; ?>" class="tooltip" style="display: none;">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col m-auto">
                                                    <div class="card mt-5">
                                                        <form method="POST" action="./scripts/edit_product.php? id=<?php echo $rows['ID']; ?>">
                                                            <table class='table table-bordered'>
                                                                <thead>
                                                                    <tr>
                                                                        <th>ID</th>
                                                                        <th>company</th>
                                                                        <th>adress</th>
                                                                        <th>streetnr</th>
                                                                        <th>zipcode</th>
                                                                        <th>city</th>
                                                                        <th>state</th>
                                                                        <th>countryid</th>
                                                                        <th>telephone</th>
                                                                        <th>website</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <input type="text" name="ID" value="<?php echo $rows['ID']; ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="company" value="<?php echo $rows['company']; ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="adress" value="<?php echo $rows['adress']; ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="streetnr" value="<?php echo $rows['streetnr']; ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="zipcode" value="<?php echo $rows['zipcode']; ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="city" value="<?php echo $rows['city']; ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="state" value="<?php echo $rows['state']; ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="countryid" value="<?php echo $rows['countryid']; ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="telephone" value="<?php echo $rows['telephone']; ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="website" value="<?php echo $rows['website']; ?>">
                                                                        </td>

                                                                        <td>
                                                                            <input type="submit" class="button-edit ed" name="Wijzig" value="Wijzig">
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <form method="POST" action="./scripts/delete_product.php?id=<?php echo $rows['ID']; ?>">
                                        <input type="hidden" name="ID" value="<?php echo $rows['ID']; ?>">
                                        <input type="submit" class="button-delete de" name="Delete" onclick="return confirm('Are you sure you want to delete this item?')" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
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