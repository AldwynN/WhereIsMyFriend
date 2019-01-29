<?php ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Profil</title>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
        <link href="css/cssNavBar.css" rel="stylesheet" type="text/css"/>
        <link href="css/cssProfil.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        include 'server/inc/nav.inc.php';
        ?>        
        <div id="content">
            <div class="card">
                <div class="card-header"
                     style="background-image: url(https://static-assets-prod.epicgames.com/fortnite/static/webpack/8704d4d5ffd1c315ac8e2c805a585764.jpg)"
                     >
                    <div class="card-header-bar">
                        <a href="#" class="btn-message"><span class="sr-only">Message</span></a>
                    </div>

                    <div class="card-header-slanted-edge">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 200"><path class="polygon" d="M-20,200,1000,0V200Z" /></svg>

                    </div>
                </div>

                <div class="card-body">
                    <h2 class="name">Exemple Concret</h2>
                    <h4 class="job-title">Éboueur</h4>
                    <div class="bio">Despacito ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, miam.</div>
                </div>
            </div>

        </div>
        <?= "</div>" /* Permet de fermer le div ouvert dans la nav */ ?>
    </body>
</html>