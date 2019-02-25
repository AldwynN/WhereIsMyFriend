<?php

/* Titre : Manager de la personne connectée
 * Date : Lundi, 11.02.2019
 * Auteurs : Romain Peretti - Gawen Ackermann
 * Version : 1.0
 * Description : Manager comportant les différents fonctions pour l'utilisateur connecté
 */
require_once __DIR__ . '/../class/User.php';
require_once __DIR__ . '/../database/database.php';


function getAllFriends(){
     $sqlGetAllFriends = "SELECT * FROM `users`";
        try {
            $stmt = Database::prepare($sqlGetAllFriends);
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