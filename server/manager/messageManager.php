<?php
/* Titre : Manager de la classe "Message"
 * Date : Mardi, 22.01.2019
 * Auteurs : Romain Peretti - Khalil Meddeb
 * Version : 1.0
 * Description : Manager comportant les différents fonctions en rapport avec la classe "Message"
 */
require_once __DIR__ . '/../class/Message.php';
require_once __DIR__ . '/../database/database.php';
class MessageManager{
    
    public static function GetConversation($idUserSent,$idUserReceived){
    $sql = "SELECT * FROM `messages` where idUserSent in (12, 13) and idUserReceived in (12, 13) order by dateSent";
    try {
        $stmt = Database::prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
    } catch (PDOException $e) {
        echo "PDOException Error: " . $e->getMessage();
        return FALSE;
    }
}
    
}