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

    $requeteMessage = "SELECT * FROM messages INNER JOIN utilisateurs ON utilisateurs.id = messages.id_utilisateur WHERE id_salon = '".$_GET['id']."'";
    $queryMessage = mysqli_query($connexion, $requeteMessage);
    $resultMessage = mysqli_fetch_all($queryMessage);

    $countMessage = count($resultMessage) ; 
    


}



?>


<!DOCTYPE html>
<html lang="fr">
<link rel="stylesheet" href="salon.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body id="visionage">
    <main>
        <form class ="rechercher" action="" method="POST">
            <input type="text" id="nav" placeholder="Lien Youtube">
            <input type="submit" value="Rechercher">
        </form>
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


                    

                    for ($i=0; $i < $countMessage ; $i++) 
                    { ?>
                        <div>

                            <?php
                            
                            echo $resultMessage[$i][5].':'.$resultMessage[$i][3] ;                                    
                            
                            ?>
                        </div>
                    <?php
                    }
                    if (isset($_POST['sendMessage'])) 
                    {
                        if (strlen($_POST['message']) != 0) 
                        {
                            
                            $sendMessage= $_POST['message'];
                            $connexion = mysqli_connect("localhost", "root","","confinement");
                            $requeteNewMessage="INSERT INTO messages (id_utilisateur, id_salon, message) VALUES ('".$_SESSION['id']."' , '".$_GET['id']."', '".$sendMessage."')";

                            $queryNewMessage = mysqli_query($connexion,$requeteNewMessage);
                            header('Location:salon.php?id='.$_GET['id'].'');
                        }



                    } 
                    
                    ?>


                    </div>
                    <div id="bouton">
                        <form class ="send" action="" method="post">
                            <input type="text" name="message" id="envoyer" placeholder="Écrire un message" required>
                            <input type="submit" name="sendMessage"  value="Send">
                        </form>
                    </div>
                </section>
                <div class="hide">Three
                    <br>has
                    <br>extra
                    <br>text
                </div>
            </div>
        </main>
    </body>
    </html>