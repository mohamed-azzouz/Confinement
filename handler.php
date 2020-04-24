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