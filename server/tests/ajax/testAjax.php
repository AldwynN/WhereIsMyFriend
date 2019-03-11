 <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <button type="button" id='envoyer'>envoyer</button>
        <p id='test'></p>
        <p id='commentaire'></p>
    </body>
</html>



<script>
    
    $("#envoyer").click(function () {
        var idUserSent = 15;
        var idUserReceived = 16;
        var message = "salut ca va";
        var dateSent = Date.now();
        $.ajax({
            url: 'testRessourceAjax.php',
            type: 'GET',
            data: 'idUserSent=' + idUserSent + '&idUserReceived=' + idUserReceived + "&message=" + message + "&dateSent=" + dateSent,
            dataType: 'json',
            cache: true,
            success  : function(data) {  
                       // Informe l'utilisateur que l'opération est terminé et renvoie le résultat
                       console.log(data); 
                     },
            error: function (resultat, statut, erreur) {
                document.getElementById("test").innerHTML = "ca n'a pas fonctionner";
            }
        });

    });

</script>
