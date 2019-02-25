<?php
require_once __DIR__ . '../server/manager/userManager.php';
if (isset($_GET['id'])) {
        $user = UserManager::GetUserInfosById($_GET['id']);
    } else {
        $user = UserManager::GetUserInfosById(7);
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Profil</title>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
        <link href="css/cssNavBar.css" rel="stylesheet" type="text/css"/>
        <link href="css/cssProfil.css" rel="stylesheet" type="text/css"/>
        <link href="css/cssUserList.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include 'server/inc/nav.inc.php'; ?>        
        <main>
            <?php 
            include 'server/inc/userListButton.inc.php';
            
            include 'server/inc/cardProfil.inc.php';
            ?>
        </main>
        
        <?php include 'server/inc/userList.inc.php'; ?>
        
        

        <?= "</div>" /* Permet de fermer le div ouvert dans la nav */ ?>
    </body>
    
</html>