<?php
include "./dbconnect.php";
include "./scripts/signup_contr.inc.php";
include "./scripts/signup_model.php";
require_once "./scripts/config_session.php";
?>
<!DOCTYPE html>
<html lang="nl">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Nathanial">
	<meta name="school" content="School JS Opdracht">
	<link rel="stylesheet" href="./css/style.css">
	<link rel="icon" href="./pbl.svg" type="image/svg">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<title>Pong</title>
</head>

<body>
	<header>
		<?php
		include "nav_cli.html";
		?>
	</header>

	<main class="flexverticalcenter">
	</main>

	<div class='main_log'>
		<div class="form-container">
			<form action="./scripts/signup_script.php" method="post" class="inner_form">
				<h1>Account aanmaken</h1><br>
				<?php
				if (isset($_SESSION["errors_signup"]) && !empty($_SESSION["errors_signup"])) {
					echo "<h5>Please check the following points: " . implode("<br>", $_SESSION["errors_signup"]) . "</h5>";
					$_SESSION["errors_signup"] = [];
				}
				?>

				<label for="first_name">Voornaam:</label>
				<input type="text" id="first_name" name="first_name">

				<label for="last_name">Achternaam:</label>
				<input type="text" id="last_name" name="last_name">

				<label for="last_name">Email:</label>
				<input type="email" id="email" name="email" pattern="[^ @]*@[^ @]*" placeholder="EXAMPLE@MAIl.COM">

				<label for="adress">Adres:</label>
				<input type="text" id="adress" name="adress">

				<label for="zipcode">Postcode:</label>
				<input type="text" id="zipcode" name="zipcode">

				<label for="city">Plaats:</label>
				<input type="text" id="city" name="city">

				<label for="state">Provincie:</label>
				<input type="text" id="state" name="state">

				<label for="country">Land:</label>
				<input type="text" id="country" name="country">
				<label for="telephone">Telefoon:</label>
				<input type="tel" id="telephone" name="telephone" pattern="[0-9\+]+" title="Please enter only numbers and the '+' sign">


				<label for="password">Wachtwoord:</label>
				<input type="password" id="password" name="password">

				<label for="herhalPassword">Herhaal wachtwoord:</label>
				<input type="password" id="herhalPassword" name="herhalPassword">

				<p class="form-error"><?php echo isset($errors['user_exist']) ? $errors['user_exist'] : ''; ?></p>
				<p class="form-error"><?php echo isset($errors['email_exist']) ? $errors['email_exist'] : ''; ?></p>

				<button class="submit" type="submit">Aanmelden</button>
			</form>
		</div>
	</div>

	<footer>
		<br><br><br><br><br><br><br><br><br><br><br>
		<?php
		include "footer.html";
		?>
	</footer>

	<script src="./index.js"></script>
</body>

</html>