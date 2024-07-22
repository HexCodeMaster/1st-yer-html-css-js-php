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

        <!-- hieronder wordt het menu opgehaald. -->
        <?php
        session_start();
        include "nav_super.html";
        ?>
    </header>
    <div class="container">
        <div class="row">
            <div class="col m-auto">
                <div class="card mt-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>first_name</th>
                                <th>last_name</th>
                                <th>email</th>
                                <th>adress</th>
                                <th>zipcode</th>
                                <th>city</th>
                                <th>state</th>
                                <th>telephone</th>
                                <th>country</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <?php
                        $result = $db->prepare("SELECT * FROM client");
                        $result->execute();

                        while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <td><?php echo $rows['id']; ?></td>
                                <td><?php echo $rows['first_name']; ?></td>
                                <td><?php echo $rows['last_name']; ?></td>
                                <td><?php echo $rows['email']; ?></td>
                                <td><?php echo $rows['adress']; ?></td>
                                <td><?php echo $rows['zipcode']; ?></td>
                                <td><?php echo $rows['city']; ?></td>
                                <td><?php echo $rows['state']; ?></td>
                                <td><?php echo $rows['telephone']; ?></td>
                                <td><?php echo $rows['country']; ?></td>

                                <td>
                                    <a href="#" class="button-edit ed" title="Edit Client" onclick="showTooltip('tooltipContent<?php echo $rows['id']; ?>')">Edit</a>
                                    <div id="tooltipContent<?php echo $rows['id']; ?>" class="tooltip" style="display: none;">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col m-auto">
                                                    <div class="card mt-5">
                                                    <form method="POST" action="./scripts/edit_clint.php?id=<?php echo $rows['id']; ?>" enctype="multipart/form-data">
                                                            <table class='table table-bordered'>
                                                                <thead>
                                                                    <tr>
                                                                        <th>first_name</th>
                                                                        <th>last_name</th>
                                                                        <th>email</th>
                                                                        <th>adress</th>
                                                                        <th>zipcode</th>
                                                                        <th>city</th>
                                                                        <th>state</th>
                                                                        <th>telephone</th>
                                                                        <th>country</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>

                                                                        <td>
                                                                            <input type="text" name="first_name" value="<?php echo $rows['first_name']; ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="last_name" value="<?php echo $rows['last_name']; ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="email" value="<?php echo $rows['email']; ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="adress" value="<?php echo $rows['adress']; ?>">
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
                                                                            <input type="text" name="telephone" value="<?php echo $rows['telephone']; ?>">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="country" value="<?php echo $rows['country']; ?>">
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
                                    <form method="POST" action="./scripts/delete_clint.php?id=<?php echo $rows['id']; ?>">
                                        <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
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
    <script src="./index.js">
    </script>
</body>

</html>