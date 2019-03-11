<?php
include_once './server/inc/inc.all.php';

$idUserSent = 8;
$idUserReceived = 7;

$res = MessageManager::GetConversation($idUserSent, $idUserReceived);
$UserSentInfos = UserManager::GetUserInfosById($idUserSent)[0];

if (isset($_POST["btnSend"])) {
    $_POST["txtMessage"];
    $message = filter_input(INPUT_POST, "txtMessage", FILTER_SANITIZE_STRING);
    $idUserReceived = 8;
    $idUserSent = 7;
    if (MessageManager::AddMessage($idUserSent, $idUserReceived, $message)) {
        echo '<script>alert("Message envoyé !");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Messagerie</title>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
        <link href="css/cssNavBar.css" rel="stylesheet" type="text/css"/>
        <link href="css/cssChat.css" rel="stylesheet" type="text/css"/>
        <link href="css/cssUserList.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <?php include 'server/inc/nav.inc.php'; ?>
        <main>
            <?php include 'server/inc/userListButton.inc.php'; ?>

            <form method="POST" action="#" class='chat'>
                <table class='bord'>
                    <thead>
                        Écrivez votre message ci-dessous
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <textarea name="txtMessage"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="btnSend"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>VOUS DISCUTEZ AVEC : <?= $UserSentInfos->firstName ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>DERNIER MESSAGE ENVOYÉ LE : <?= $res[0]->dateSent ?></p>
                            </td>
                        </tr>
                        <?php foreach ($res as $r): ?>
                            <tr>
                                <td>
                                    <p><?= $r->message ?></p>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </form>

        </main>

        <?php include 'server/inc/userList.inc.php';
        "</div>" /* Permet de fermer le div ouvert dans la nav */
        ?>

    </body>
</html>