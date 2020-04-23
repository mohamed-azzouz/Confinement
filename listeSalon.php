<?php


    $connexion = mysqli_connect("localhost", "root","","confinement");
    $requetemessage="SELECT * FROM salon";
    $querymessage = mysqli_query($connexion,$requetemessage);
    $resultatmessage = mysqli_fetch_all($querymessage);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Liste Salon</title>
</head>
<body>

</body>
</html>
