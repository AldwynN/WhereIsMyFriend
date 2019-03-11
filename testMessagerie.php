<?php
include_once '/server/inc/inc.all.php';
$idUserSent = 8;
$idUserReceived = 7;

$res = MessageManager::GetConversation($idUserSent, $idUserReceived)[0];
$UserSentInfos = UserManager::GetUserInfosById($idUserSent)[0];
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
    </head>
    <body>
        <form method="POST" action="#">
            <table>
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
                        <td>
                            <p>DERNIER MESSAGE ENVOYÉ LE : <?= $res->dateSent ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><?= $res->message ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>VOTRE MESSAGE</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>
