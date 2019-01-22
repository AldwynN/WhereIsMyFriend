<?php

/**
 * Cette classe contient les informations
 * sur une personne (utilisateur) du système
 * de pointage.
 * 
 * @remark Première étape est de faire un objet
 *         qui contient les données uniquement.
 *         Pas de méthodes pour accéder ou manipuler
 *         l'objet.
 */
class Message {

    /** @var int L'id du message */
    public $idMessage;

    /** @var int L'id de l'utilisateur qui envoie le message */
    public $idUserSent;
    
    /** @var int L'id de l'utilisateur qui reçois le message */
    public $idUserReceived;
    
    /** @var string Le message de l'utilisateur */
    public $message;

    /** @var date La date et heure de l'envoie du message */
    public $dateSent;

}