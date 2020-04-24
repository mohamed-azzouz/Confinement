<?php

session_start();

if (isset($_GET['id'])) 
{

    $connexion = mysqli_connect("localhost", "root","","confinement");
    $requetemessage="SELECT * FROM salon WHERE id = '".$_GET['id']."'";
    $querymessage = mysqli_query($connexion,$requetemessage);
    $resultatmessage = mysqli_fetch_all($querymessage);

   
    
    $requeteUser="SELECT * from utilisateurs WHERE id = '".$_SESSION['id']."'";
    $queryUser = mysqli_query($connexion,$requeteUser);
    $resultatUser = mysqli_fetch_assoc($queryUser);

    


}



?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="salon.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <title>Document</title>
</head>
<body id="visionage">
    <main>
        <form class ="rechercher" action="" method="POST">
            <input type="text" id="nav" placeholder="Lien Youtube" name="lien">
            <input type="submit" value="Rechercher" >
        </form>

        <?php

        if (isset($_POST['lien']) AND !empty($_POST['lien'])) 
        {
            $newLien = "INSERT INTO historique(id_utilisateur, id_salon, lien) VALUES ('".$_SESSION['id']."', '".$_GET['id']."', '".$_POST['lien']."')";
            $queryNewLien = mysqli_query($connexion, $newLien);

            echo $newLien;
        }
        ?>
        <div class="box">
            <div id="video">
                <iframe width="900" height="500" src="https://www.youtube.com/embed/BWG29Kss-rY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <section id="chatbox">
                <div id="historique">
                    Historique Chat
                </div>
                <div id="utilisateurs">
                    Utilisateurs dans le salon : Serjuani, Mohamed, Paul, Raph.
                </div>
                <div id="messages">
                    Messages :<br><br>
                    <?php

                    $requeteMessage = "SELECT * FROM messages INNER JOIN utilisateurs ON utilisateurs.id = messages.id_utilisateur WHERE id_salon = '".$_GET['id']."'";
                    $queryMessage = mysqli_query($connexion, $requeteMessage);
                    $resultMessage = mysqli_fetch_all($queryMessage);

                    foreach($resultMessage as $messages): ?>
                        <div><?php echo $messages[5].':'.$messages[3]; ?></div>
                    <?php endforeach; ?>
                
                    

                 </div>
                 <?php                    
                    
                    if (isset($_POST['sendMessage'])) 
                    {
                        if (strlen($_POST['message']) != 0) 
                        {
                        
                            $message= $_POST['message'];
                            $connexion = mysqli_connect("localhost", "root","","confinement");
                            $requeteNewMessage="INSERT INTO messages (id_utilisateur, id_salon, message) VALUES ('".$_SESSION['id']."' , '".$_GET['id']."', '".$message."')";

                            $queryNewMessage = mysqli_query($connexion,$requeteNewMessage);
                       		
                       		header('location:salon.php?id=2');
                            

                           
                        }



                    } 
                    
                    ?>
                    <div id="bouton">
                        <form class ="send" action="" method="post" id="form">
                            <input type="text" name="message" id="envoyer" placeholder="Écrire un message" required>
                           <input id="sendMessage" type="submit" name="sendMessage"  value="Send" id="envoi">
                        </form>
                    </div>
               
            </section>
                
        
        </main>
        


      	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script src="main.js"></script>



       
    </body>
</html>

