

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

		include "nav.html";
		?>
	</header>

	<!-- op de home pagina wat enthousiaste tekst over het bedrijf en de producten -->
	<main class="flexverticalcenter">


	</main>


	<div class='main_log'>



		<section class="container ctr" id="mainBox">
		
			<section class="backbox">

				<div class="collector">
					<div class="login-container">

						<form action="./scripts/login.php" method="post" class="inner_form">
							<h1>Login</h1>

							<label for="email">Email:</label>
							<input type="email" id="email" name="email" required>

							<label for="password">Password:</label>
							<input type="password" id="password" name="password" required>

							<button class="submit" type="submit" name="login" value="login">Log In</button>

							<p>Heeft u nog geen account? <a href="signup_login.php">Meld u hier aan</a>.</p>
						</form>


					</div>
					<div class="logintag">
						<h2>Inloggen</h2>
					</div>
				</div>
			</section>
		</section>
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