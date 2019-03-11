<?php

/* Titre : Manager de la classe "Message"
 * Date : Mardi, 22.01.2019
 * Auteurs : Romain Peretti - Khalil Meddeb
 * Version : 1.0
 * Description : Manager comportant les différents fonctions en rapport avec la classe "Message"
 */

class MessageManager {

    /**
     * Fonction récupérant tous les messages reçu par son ami
     * @param int $idUserSent
     * @param int $idUserReceived
     * @return Classe Message sinon FALSE
     */
    public static function GetConversation($idUserSent, $idUserReceived) {
        $idConversation = 1;
        $sql = "SELECT m.message, m.dateSent, u.idUser FROM conversations c, messages m, users u 
where c.idConversation = :idConversation and idUser = idUserSent
group by m.dateSent order by m.dateSent desc";

        try {
            $stmt = Database::prepare($sql);
            $stmt->execute(array(
                "idConversation" => $idConversation
            ));
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, "Message");
            return $result;
        } catch (PDOException $e) {
            echo "PDOException Error: " . $e->getMessage();
            return FALSE;
        }
    }

    /**
     * Fonction récupérant tous les messages reçu par son ami
     * @param int $idUserSent
     * @param int $idUserReceived
     * @return Boolean TRUE sinon FALSE
     */
    public static function AddMessage($idUserSent, $idUserReceived, $message) {
        $idConversation = 1;
        $sqlInsertMessage = "INSERT INTO messages (idUserSent, idUserReceived, message, dateSent) VALUES (:idUserSent, :idUserReceived, :m, NOW())";
        $sqlInsertMessageToConversation = "INSERT INTO conversations (idConversation, idMessage) VALUES (:idConversation, :idMessage)";
        try {
            $stmt = Database::prepare($sqlInsertMessage);
            if ($stmt->execute(array(
                        "idUserSent" => $idUserSent,
                        "idUserReceived" => $idUserReceived,
                        "m" => $message
                    ))) {
                $lastIdMessage = Database::lastInsertId();
                $stmt = Database::prepare($sqlInsertMessageToConversation);
                if ($stmt->execute(array(
                            "idConversation" => $idConversation,
                            "idMessage" => $lastIdMessage
                        ))) {
                    return true;
                }
            }
        } catch (PDOException $e) {
            echo "PDOException Error: " . $e->getMessage();
            return FALSE;
        }
    }

}
