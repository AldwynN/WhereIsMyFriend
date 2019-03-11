<?php

/* Titre : Manager de la personne connectée
 * Date : Lundi, 11.02.2019
 * Auteurs : Romain Peretti - Gawen Ackermann
 * Version : 1.0
 * Description : Manager comportant les différents fonctions pour l'utilisateur connecté
 */

class FriendManager {

    public static function getAllFriendsInfosForUser($idUser) {
        try {
            $stmt = Database::prepare('SELECT f.idFriend, u.email, u.lastName, u.firstName, u.adress FROM friends f, users u WHERE f.idUser = :id and f.idFriend = u.idUser');
            $stmt->bindParam(":id", $idUser, PDO::PARAM_INT, 50);
            $stmt->execute();
            $friends = $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
            return $friends;
        } catch (PDOException $e) {
            return false;
        }
    }

    function addFriend() {
        try {
            
        } catch (Exception $ex) {
            
        }
    }

    function deleteFriend() {
        try {
            
        } catch (Exception $ex) {
            
        }
    }

}
