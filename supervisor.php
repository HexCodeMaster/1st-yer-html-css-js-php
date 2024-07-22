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
    <link rel="stylesheet" type="text/css" href="company.css">
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
                                <th>id</th>
                                <th>username</th>
                                <th>usertype</th>
                                <th>Email</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <?php
                        $result = $db->prepare("SELECT * FROM admins");
                        $result->execute();

                        while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <td><?php echo $rows['id']; ?></td>
                                <td><?php echo $rows['username']; ?></td>
                                <td><?php echo $rows['usertype']; ?></td>
                                <td><?php echo $rows['email']; ?></td>
                                <td>
                                    <a href="#" class="button-edit ed" title="Edit Product" onclick="showTooltip('tooltipContent<?php echo $rows['id']; ?>')">Edit</a>
                                    <div id="tooltipContent<?php echo $rows['id']; ?>" class="tooltip" style="display: none;">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col m-auto">
                                                    <div class="card mt-5">
                                                        <form method="POST" action="./scripts/edit_admin.php?id=<?php echo $rows['id']; ?>">
                                                            <table class='table table-bordered'>
                                                                <thead>
                                                                    <tr>

                                                                        <th>username</th>
                                                                        <th>usertype</th>
                                                                        <th>email</th>
                                                                        <th>Edit</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <input type="text" name="username" value="<?php echo $rows['username']; ?>">
                                                                        </td>

                                                                        <td>
                                                                            <input type="text" name="email" value="<?php echo $rows['email']; ?>">
                                                                        </td>

                                </td>
                                <td>
                                    <select name="status">
                                        <option value="active" <?php echo ($rows['usertype'] == 'clint') ? 'selected' : ''; ?>>remove</option>
                                        <option value="active" <?php echo ($rows['usertype'] == 'admin') ? 'selected' : ''; ?>>admin</option>
                                        <option value="inactive" <?php echo ($rows['usertype'] == 'supervisor') ? 'selected' : ''; ?>>supervisor</option>
                                    </select>
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