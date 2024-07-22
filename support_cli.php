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
			include "nav_cli.html";
		?>
	</header>
 
	<!-- op de home pagina wat enthousiaste tekst over het bedrijf en de producten -->
 	<main class="flexverticalcenter">

        <h2>Hartelijk dank voor uw reactie</h2>
        <p>Onderstaand kunt u teruglezen wat u heeft ingezonden als reactie. U kunt dit bericht niet meer wijzigen.</p>
        <form action="index.php" method="post">
        <div class="fieldset-container">
    <fieldset class="fieldset">
        <legend>Persoonlijke informatie</legend>
        <input type="text" name="username" readonly value="<?= isset($_POST["username"]) ? htmlspecialchars($_POST["username"]) : ''; ?>" placeholder="name">
        <input type="email" name="email" readonly value="<?= isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : ''; ?>" placeholder="email">
        <input type="tel" name="telephone" readonly value="<?= isset($_POST["telephone"]) ? htmlspecialchars($_POST["telephone"]) : ''; ?>" placeholder="tel">
    </fieldset>
</div>

<div class="fieldset-container">
    <fieldset class="fieldset">
        <legend>Uw mening</legend>
        <textarea name="opinion" rows="5" cols="90" readonly><?= isset($_POST["opinion"]) ? htmlspecialchars($_POST["opinion"]) : ''; ?></textarea>
    </fieldset>
</div>


            <button type="submit" class="button-submit">Terug naar hoofdpagina</button>
        </form>
    </main>
</body>
</html>
