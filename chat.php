<?php 

$db = new PDO('mysql:host=localhost;dbname=confinement;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

$task = "list";

    if(array_key_exists("task", $_GET))
    {
        $task = $_GET['task'];
    }

    if($task == "write")
    {
        postMessage();
    } 
    else 
    {
        getMessages();
    }

    function getMessages()
    {
        global $db;
        $resultats = $db->query("SELECT * FROM chat ORDER BY date DESC LIMIT 10");
        $messages = $resultats->fetchAll();
        echo json_encode($messages);
    }

    function postMessage()
    {
        global $db;
   
        if(!array_key_exists('pseudo', $_POST) || !array_key_exists('message', $_POST)){
      
          echo json_encode(["status" => "error", "message" => "Un des champs est vide"]);
          return;
    }

    $pseudo = $_POST['pseudo'];
    $message = $_POST['message'];
    $query = $db->prepare('INSERT INTO chat SET utilisateur = :pseudo, message = :message, date = NOW()');
    $query->execute([
        "pseudo" => $pseudo,
        "message" => $message
      ]);

    echo json_encode(["status" => "success"]); 
    }
    
    ?>

<html>

<link rel="stylesheet" href="css/style.css">

<section id="chatSection">
    <div id="chatDiv">
        <article id="messageArticle">
            
        </article>
    </div>
    <!-- <form id="chatForm" action="handler.php?task=write" method="POST">
        <input id="pseudoInput" type="text" name="pseudo" placeholder="Pseudo">
        <input id="messageInput" type="text" name="message" placeholder="Votre message">
        <input type="submit" name ="envoyerMessage" value="Envoyer">
    <form> -->
    <form id="chatForm" action="chat.php?task=write" method="POST">
        <input id="pseudoInput" type="text" name="pseudo" placeholder="Pseudo">
        <input id="messageInput" type="text" name="message" placeholder="Votre message">
        <input type="submit" name ="envoyerMessage" value="Envoyer">
    <form>
</section>

<section>
<iframe width="1280" height="721" src="https://www.youtube.com/embed/-z1AhXvycDU?list=RDGMEMHDXYb1_DDSgDsobPsOFxpAVM-z1AhXvycDU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</section>

<script src="js/chattoast.js"></script>

</html>