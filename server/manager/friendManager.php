<?php
include_once './server/inc/inc.all.php';
/* Titre : Manager de la personne connectée
 * Date : Lundi, 11.02.2019
 * Auteurs : Romain Peretti - Gawen Ackermann
 * Version : 1.0
 * Description : Manager comportant les différents fonctions pour l'utilisateur connecté
 */



function getAllFriends($idCurrentUser){
     $sqlGetAllFriends = "SELECT * FROM `friends´ WHERE idUser = :idCurrentUser";
        try {
            $stmt = Database::prepare($sqlGetAllFriends);
            $stmt->bindParam("idCurrentUser", $idCurrentUser, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
            return $result;
        } catch (PDOException $e) {
            return false;
        }
}

function addFriend(){
     try {
         
     } catch (Exception $ex) {
         
     }
}

function deleteFriend(){
     try {
         
     } catch (Exception $ex) {
         
     }
}