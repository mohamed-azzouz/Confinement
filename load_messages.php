<?php
    $connexion = mysqli_connect("localhost", "root","","confinement");
    $requeteMessage = "SELECT * FROM messages INNER JOIN utilisateurs ON utilisateurs.id = messages.id_utilisateur WHERE id_salon = '".$_GET['id']."'";
                    $queryMessage = mysqli_query($connexion, $requeteMessage);
                    $resultMessage = mysqli_fetch_all($queryMessage);

                    $countMessage = count($resultMessage) ; 
        
                    foreach($resultMessage as $messages): ?>
                        <div><?php echo $messages[5].':'.$messages[3]; ?></div>
                    <?php endforeach; ?>          