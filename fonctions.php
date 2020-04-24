<?php



function inscription()
{

	
    if(!isset($_SESSION['login']))
    {
    	

        if(isset($_POST['valider']))
        {

          
            if(!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['confirmpassword']) )
            {

            	$connexion = mysqli_connect('Localhost', 'root', '', 'confinement');
                $requeteUser = "SELECT * FROM utilisateurs WHERE login = '".$_POST['login']."'";
                $queryUser = mysqli_query($connexion, $requeteUser);
                $resultatUser = mysqli_fetch_row($queryUser);

                if($resultatUser == 0)
                {

                    if($_POST['password'] == $_POST['confirmpassword'] )
                    {
                        $password = $_POST['password'];
                        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                        $requeteNewUser = "INSERT INTO utilisateurs (login, password, avatar) VALUES ('".$_POST['login']."','".$passwordHash."', 'VIDE')";
                        $queryNewUser = mysqli_query($connexion, $requeteNewUser);
                        header('location:connexion.php');
                        
                        

                    }

                    else
                    {
                        echo '<div class="erreur">Mot de passe et confirmation de mot de passe différents.</div>'.'</br>';
                    }

                }

                else
                {
                    echo '<div class="erreur">Le login est déjà existant, merci de le modifier et de réessayer de nouveau.</div>'.'<br/>';
                }

            }

            else
            {
                echo '<div class="erreur">Veuillez remplir tous les champs.</div>'.'</br>';
            }

        }
    }
    else
    { 
        header('location:index.php');
    }



}








function connexion()

{

    if(!isset($_SESSION['login']))
    {


        if(isset($_POST['valider']))
        {
            if(!empty($_POST['login']) and !empty($_POST['password']))
            {
                
                $connexion = mysqli_connect('Localhost', 'root', '', 'confinement');
                $requeteLogUser = "SELECT * FROM utilisateurs WHERE login = '".$_POST['login']."'";
                $queryLogUser = mysqli_query($connexion, $requeteLogUser);
                $resultatLogUser = mysqli_fetch_assoc($queryLogUser);
                
                $password=$_POST['password'];

             

                if($resultatLogUser['login'] != $_POST['login'])
                {
                    echo '<div class="erreur">Login inexistant</div>'.'<br/>';
                }

                else
                {
                    if($_POST['login'] == $resultatLogUser['login'])
                    {
                        if(password_verify($password, $resultatLogUser['password']))
                        {
                            
                            $_SESSION['id'] = $resultatLogUser['id'];
                            $_SESSION['login'] = $resultatLogUser['login'];
                            $_SESSION['password'] = $resultatLogUser['password'];
                            
                            header('location:index.php');
                        }
                        else
                        {
                            echo '<div class="erreur">Mot de passe incorrecte</div>'.'<br/>';
                        }
                    }

                }

            }
        }

    }
    else
    { 
        header('location:index.php');  
    }

}

function addSalon()
{
	if (isset($_SESSION['login'])) 
	{
		if (isset($_POST['addSalon'])) 
		{
			if (!empty($_POST['nameSalon'])) 
			{
				$connexion = mysqli_connect('Localhost', 'root', '', 'confinement');
				$requeteAddSalon = "INSERT INTO salon (id_utilisateur, nom) VALUES ('".$_SESSION['id']."', '".$_POST['nameSalon']."')";
				$queryAddSalon = mysqli_query($connexion, $requeteAddSalon);

				$lastId = "SELECT LAST_INSERT_ID() FROM salon";
				$queryLastId = mysqli_query($connexion, $lastId);
				$resultId = mysqli_fetch_all($queryLastId);

				header('location:salon.php?id='.$resultId[0][0].'');

				

			}
		}
	}
	else
	{
		echo "VEILLEZ VOUS CONNECTEZ";
	}
}

function updateUser()
{
	if (isset($_SESSION['login'])) 
	{
		$connexion = mysqli_connect("Localhost", "root", "", "confinement") ;

		$requeteLogin = "SELECT * FROM utilisateurs WHERE login = '".$_SESSION['login']."'";         
		$queryLogin = mysqli_query($connexion, $requeteLogin);         
		$resultatLogin = mysqli_fetch_all($queryLogin); 

		


		if(isset($_POST['modifier']))
		{
			 


			if (!empty($_POST['login']) && $resultatLogin == $_POST['login'])             
			{                 
				echo "Ce Login est déjà prit";             
			}
			elseif ($_POST['password'] != $_POST['passwordcon']) 
			{
				echo "Les Mots de passes ne correspondent pas";
			}          
			else
			{

				if(isset($_POST["login"]))
				{
					$login = $_POST["login"];
				}
				if($login != $resultatLogin[0][1] && !empty($_POST['login']))

				{
					$connexion = mysqli_connect("Localhost", "root", "", "confinement") ;
					$upLog = "UPDATE utilisateurs SET login = \"$login\" WHERE utilisateurs.login='".$resultatLogin[0][1]."'";
					$result = mysqli_query($connexion, $upLog);

					$_SESSION['login'] = $login ;
					header('location:profil.php');

				}
				if($_POST['password'] != $resultatLogin[0][2] && !empty($_POST['password']))
				{
					$password1 = $_POST['password'];
					$passwordhash = password_hash($password1, PASSWORD_BCRYPT, array('cost' => 12));
					$connexion = mysqli_connect("Localhost", "root", "", "confinement") ;
					$upPass = "UPDATE utilisateurs SET password = \"$passwordhash\" WHERE utilisateurs.password='".$resultatLogin[0][2]."'";
					$result = mysqli_query($connexion, $upPass);
					
					header('location:profil.php');
				}
			}
			if (isset($_FILES['avatar']) AND !empty($_FILES['avatar'])) 
			{
				$tailleMax = 2097152 ;
				$extensionsValides = $arrayName = array('jpg', 'jpeg', 'gif', 'png');
				if ($_FILES['avatar']['size'] <= $tailleMax) 
				{
					$extensionsUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
					if (in_array($extensionsUpload, $extensionsValides)) 
					{
						$chemin = "avatar/".$resultatLogin[0][1].".".$extensionsUpload;

						$deplacement = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
						if ($deplacement) 
						{
							$updateAvatar = "UPDATE utilisateurs SET avatar = '".$resultatLogin[0][1].".".$extensionsUpload."' WHERE id = ".$resultatLogin[0][0]."";
							$queryAvatar = mysqli_query($connexion,$updateAvatar);
						}
						else
						{
							$msg = "Erreur durant l'importation de votre photo de profil" ;
						}
					}
					else
					{
						$msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png. ";
					}

				}
				else
				{
					$msg = "Votre photo de profil ne doit pas dépasser 2Mo" ;
				}
			}




		}
	}
	else
	{
		echo "VEUILLEZ VOUS CONNECTEZ";
	}

}

?>