<?php

/* Titre : Manager de la classe "Message"
 * Date : Mardi, 22.01.2019
 * Auteurs : Romain Peretti - Khalil Meddeb
 * Version : 1.0
 * Description : Manager comportant les différents fonctions en rapport avec la classe "Message"
 */

class MessageManager{
    /**
     * Fonction récupérant tous les messages reçu par son ami
     * @param int $idUserSent
     * @param int $idUserReceived
     * @return Classe Message sinon FALSE
     */
    public static function GetConversation($idUserSent,$idUserReceived){
    $sql = "SELECT m.message, m.dateSent, u.idUser FROM messages m, users u "
            . "WHERE m.idUserSent = :idUserSent AND m.idUserReceived = :idUserReceived AND u.idUser = :idUserSent";
    try {
        $stmt = Database::prepare($sql);
        $stmt->execute(array(
            "idUserSent" => $idUserSent,
            "idUserReceived" => $idUserReceived
        ));
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, "Message");
        return $result;
        
    } catch (PDOException $e) {
        echo "PDOException Error: " . $e->getMessage();
        return FALSE;
    }
}
    
}