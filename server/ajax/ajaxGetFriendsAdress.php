<?php
require_once '../inc/inc.all.php';

// Nécessaire lorsqu'on retourne du json
header('Content-Type: application/json');

$idUser = 7; // = $_GET["id"];
$friends;
if (isset($_GET["id"])) {
    $idUser = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
}
if (count($idUser) > 0) {
    $friends = FriendManager::getAllFriendsInfosForUser($idUser);
}
if ($friends === FALSE) {
    echo '{ "ReturnCode": 2, "Message": "Erreur lors de la sélection des amis"}';
    exit();
}

echo '{ "ReturnCode": 0, "Result":' . json_encode($friends) . '}';
