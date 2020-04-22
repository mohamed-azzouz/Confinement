<?php
session_start();
include('fonctions.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>New Salon</title>
</head>
<body>
	<main>
		<form method="post" action="">
			Nom : <input type="text" name="nameSalon">
			<input type="submit" name="addSalon" value="Ajouter">
			<?php
			addSalon();
			?>
		</form>
	</main>

</body>
</html>