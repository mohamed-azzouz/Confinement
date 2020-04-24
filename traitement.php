<!DOCTYPE html>
<html>
    <head>
	<title>Le tchat en AJAX !</title>
    </head>
	
    <body>
        <div id="messages">
            <!-- les messages du tchat -->

            <?php

// 

// on se connecte à notre base de données

if(!empty($_GET['id'])){ // on vérifie que l'id est bien présent et pas vide

    $id = (int) $_GET['id']; // on s'assure que c'est un nombre entier

    // on récupère les messages ayant un id plus grand que celui donné
    $requete = $bdd->prepare('SELECT * FROM messages INNER JOIN utilisateurs ON utilisateurs.id = messages.id_utilisateur WHERE id_salon = \'$id\' ORDER BY id DESC');
    $requete->execute(array("id" => $id));

    $messages = null;

    // on inscrit tous les nouveaux messages dans une variable
    while($donnees = $requete->fetch()){
        $messages .= "<p id=\"" . $donnees['id'] . "\">" . $donnees['login'] . " dit : " . $donnees['message'] . "</p>";
    }

    echo $messages; // enfin, on retourne les messages à notre script JS

}

?>


        </div>

	<form method="POST" action="traitement.php">
	    
	    Message : <textarea name="message" id="message"></textarea><br />
	   
	</form>

		<iframe width="903" height="516" src="https://www.youtube.com/embed/gg98Tf8ZW6k" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script src="main.js"></script>


    </body>
</html>