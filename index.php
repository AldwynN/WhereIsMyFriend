<!DOCTYPE html>
<?php
require_once './server/manager/userManager.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //UserManager::AddUser("Jonathane@gmail.com", sha1("pomme"), "Borel-Jaquet", "Jonathan", "Rue de Fremis 47, 1241 Puplinge")
        if(UserManager::DeleteUser(5))
        {
            echo "Good";
        }
        else{
            echo 'Nop';
        }
        UserManager::GetAllUser();
        ?>
    </body>
</html>
