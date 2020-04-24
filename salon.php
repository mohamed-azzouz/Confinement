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




if (isset($_POST['lien']) AND !empty($_POST['lien'])) 
{
 	$newLien = "INSERT INTO historique(id_utilisateur, id_salon, lien) VALUES ('".$_SESSION['id']."', '".$_GET['id']."', '".$_POST['lien']."')";
 	$queryNewLien = mysqli_query($connexion, $newLien);

 	echo $newLien;
}

$requeteHistorique = "SELECT * FROM historique INNER JOIN utilisateurs ON utilisateurs.id = historique.id_utilisateur INNER JOIN salon ON salon.id = historique.id_salon WHERE id_salon = '".$_GET["id"]."'";
$queryHistorique = mysqli_query($connexion, $requeteHistorique);
$resultHistorique = mysqli_fetch_all($queryHistorique);

}

if(!isset($_SESSION["login"])){
    header("Location:index.php");
}


?>



<?php require("templates/header2.phtml"); ?>
    <main id="main-salon">
        <form id="rechercher" action="" method="POST">
            <div id="box-imgyout">
                <img id="yout" src="img/yout.png" alt="">
            </div>
            <input type="text" id="inp-search" placeholder="Lien Youtube">
            <input type="submit" id="inpsub-search" value="search">
        </form>
        <div id="box">
            <div id="video">
                <iframe width="900" height="500" src="https://www.youtube.com/embed/EY5ac2ujJtQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <section id="historique">
                <?php foreach($resultHistorique as $lien): ?>
                    <div><?php echo "User : $lien[5]" ?></div><div><?php echo "Salon : $lien[10]"?></div>
                    <a href="<?php echo $lien[3]; ?>"><?php echo $lien[3]; ?></a>
                <?php endforeach; ?>
            </section>
            <section id="chatbox">
                <div id="messages">
                    <?php

                    $requeteMessage = "SELECT * FROM messages INNER JOIN utilisateurs ON utilisateurs.id = messages.id_utilisateur WHERE id_salon = '".$_GET['id']."'";
                    $queryMessage = mysqli_query($connexion, $requeteMessage);
                    $resultMessage = mysqli_fetch_all($queryMessage);

                    foreach($resultMessage as $messages): ?>
                        <div id="mess"><?php echo $messages[5].': '.$messages[3]; ?></div>
                    <?php endforeach; ?>
                </div>
                    <?php
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


                    <div id="bouton">
                        <form id="send" action="" method="post">
                            <input type="text" name="message" id="envoyer" placeholder="Écrire un message" required>
                            <input onClick="load_messages(); return false;" type="submit" name="sendMessage"  value="Send">
                        </form>
                    </div>
                </section>
            </div>

        </main>
<?php require("templates/footer.phtml"); ?>
        <script>
            setInterval("load_messages()", 500);
            function load_messages(messages){
                $("#messages").load("salon.php #messages");
            }
        </script>
    </body>
</html>