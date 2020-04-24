$('#envoi').click(function(e){
    e.preventDefault(); // on empêche le bouton d'envoyer le formulaire

     // on sécurise les données
    var message = encodeURIComponent( $('#message').val() );

    if(message != ""){ // on vérifie que les variables ne sont pas vides
        $.ajax({
            url : "salon.php?id=2", // on donne l'URL du fichier de traitement
            type : "post", // la requête est de type POST
            data : "&message=" + message // et on envoie nos données
        });

       $('salon.php?id=2 + '#messages'').append("<p>"+ message + "</p>"); // on ajoute le message dans la zone prévue
    }
});

function charger(){

    setTimeout( function(){

        var premierID = $('#messages p:first').attr('id'); // on récupère l'id le plus récent

        $.ajax({
            url : "charger.php?id=" + premierID, // on passe l'id le plus récent au fichier de chargement
            type : GET,
            success : function(html){
                $('salon.php?id=2 #messages').prepend(html);
            }
        });

        charger();

    }, 5000);

}

charger();

