<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="main-block">
			<div class="left-part">
				<i class="fas fa-envelope"></i>
				<i class="fas fa-at"></i>
				<i class="fas fa-mail-bulk"></i>
			</div>
			<form action="calculette.php" method="post">
				<h1>Calculatte RTT -- Maissa BEN FARHAT</h1>
				<div class="info">
					<input class="fname" type="text" name="annee" placeholder="Annee">
					<input type="text" name="nbr_jours_travailles" placeholder="Nombre de jours travailles">
					<input type="text" name="nbr_conge_payes" placeholder="Nombre de jours de conges payes">
				</div>
				<?php
					if (isset($_GET["rtt"])){
						echo '<h2> Le nombre de jours de RTT: ' . htmlspecialchars($_GET["rtt"]) . '</h2>';
						echo '<div class="info"></br></div>';
					}
				?>
				<button type="submit">Calculer</button>
			</form>	
		</div>
	</body>
</html>