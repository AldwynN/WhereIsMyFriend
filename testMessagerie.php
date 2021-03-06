<?php
include_once '/server/inc/inc.all.php';
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
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            .hisMessage {
                border: 1px dashed red;
            }

            .myMessage{
                border: 1px solid blue;
            }
        </style>
    </head>
    <body>
        <form method="POST" action="#">
            <table class='bord'>
                <thead>
                    Écrivez votre message ci-dessous
                </thead>
                <tbody>
                    <tr>
                        <td class='bord'>
                            <textarea name="txtMessage"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class='bord'>
                            <input type="submit" name="btnSend"/>
                        </td>
                    </tr>
                    <tr>
                        <td class='bord'>
                            <p>VOUS DISCUTEZ AVEC : <?= $UserSentInfos->firstName ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td class='bord'>
                            <p>DERNIER MESSAGE ENVOYÉ LE : <?= $res[0]->dateSent ?></p>
                        </td>
                    </tr>
                    <?php foreach ($res as $r): ?>
                        <tr>
                            <?php
                            if ($r->idUser == $idUserSent) {
                                echo '<td class=\'hisMessage\'>';
                            } else {
                                echo '<td class=\'myMessage\'>';
                            }
                            ?>
                    <p><?= $r->message ?></p>
                    </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </form>
    </body>
</html>
