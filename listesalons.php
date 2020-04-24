<?php
session_start();
include('fonctions.php');

$connexion = mysqli_connect('Localhost','root','','confinement');

$requeteListeSalons = "SELECT * FROM salon AS sal INNER JOIN utilisateurs AS uti ON sal.id_utilisateur =  uti.id";
$queryListeSalons = mysqli_query($connexion,$requeteListeSalons);
$resultatListeSalons = mysqli_fetch_all($queryListeSalons);
$countListeSalons = count($resultatListeSalons);

require("templates/header2.php"); ?>

    <main id="listeSalonMain">
        <section id="listeSalonTop">
            <article id="topPageArt">
                Liste des salons
            </article>
                <?php 
                    $i = 0;
                    while($i != $countListeSalons)
                    { ?>
                        <div id="salonDivGen">
                            <?php echo '<a href="salon.php?id='.$resultatListeSalons[$i][0].'">'.$resultatListeSalons[$i][2].'</a>'. " | " .$resultatListeSalons[$i][4]; ?>
                        </div>
                    <?php $i++; } ?>
        </section>
    </main>

<?php require("templates/footer.phtml")  ?>