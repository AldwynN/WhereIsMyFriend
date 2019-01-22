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
class User {

    /** @var int L'id du de l'utilisateur */
    public $idUser;

    /** @var string L'email de l'utilisateur */
    public $email;
    
    /** @var string Le mot de passe de l'utilisateur */
    public $password;
    
    /** @var string Le nom de l'utilisateur */
    public $lastName;

    /** @var int Le prénom de l'utilisateur */
    public $firstName;

    /** @var string L'adresse de l'utilisateur */
    public $adress;

}