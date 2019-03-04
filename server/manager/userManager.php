<?php
/* Titre : Manager de la classe "User"
 * Date : Mardi, 22.01.2019
 * Auteurs : Romain Peretti - Khalil Meddeb
 * Version : 1.0
 * Description : Manager comportant les différents fonctions en rapport avec la classe "User"
 */


class UserManager {

    public static function AddUser($email, $password, $lastName, $firstName, $adress) {
        $sqlInsertUser = "INSERT INTO `where_is_my_friend`.`users` (`email`, `password`,`salt`, `lastName`, `firstName`, `adress`) "
                . "VALUES (:email, :password,:salt, :lastName, :firstName, :adress);";
        $salt = uniqid(mt_rand(), true);
        $encryptPwd = sha1($password.$salt);
        try {
            $stmt = Database::prepare($sqlInsertUser);
            if (UserManager::UserExist($email)) {
                return false;
            } else {
                $stmt->bindParam("email", $email, PDO::PARAM_STR);
                $stmt->bindParam("password", $encryptPwd, PDO::PARAM_STR);
                $stmt->bindParam("salt", $salt, PDO::PARAM_INT);
                $stmt->bindParam("lastName", $lastName, PDO::PARAM_STR);
                $stmt->bindParam("firstName", $firstName, PDO::PARAM_STR);
                $stmt->bindParam("adress", $adress, PDO::PARAM_STR);
                $stmt->execute();
                return true;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function GetAllUser() {
        $sqlGetAllUser = "SELECT * FROM `users`";
        try {
            $stmt = Database::prepare($sqlGetAllUser);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function UserExist($email) {
        $sqlGetUser = "SELECT * FROM `users` where email=:email";
        try {
            $stmt = Database::prepare($sqlGetUser);
            $stmt->bindParam("email", $email, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
            if (count($result) > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function DeleteUser($idUser) {
        $sqlGetAllUser = "DELETE FROM `where_is_my_friend`.`users` WHERE `users`.`idUser` = :idUser";
        try {
            $stmt = Database::prepare($sqlGetAllUser);
            $stmt->bindParam("idUser", $idUser, PDO::PARAM_INT);
            $stmt->execute();
            return TRUE;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function EditUser($idUser, $email, $password, $lastName, $firstName, $adress) {
        $sqlGetAllUser = "UPDATE `where_is_my_friend`.`users` "
                . "SET `email` = :email, `password` = :password, `lastName` = :lastName, `firstName` = :firstName, `adress` = 'Rue des palettes 25, 1242 Thonexe' WHERE `users`.`idUser` = 1;";
        try {
            $stmt = Database::prepare($sqlGetAllUser);
            $stmt->bindParam("idUser", $idUser, PDO::PARAM_INT);
            $stmt->execute();
            return TRUE;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function GetUserInfosById($idUser) {
        try {
            $stmt = Database::prepare('SELECT * FROM where_is_my_friend.users u WHERE u.idUser = :id');
            $stmt->bindParam(":id", $idUser, PDO::PARAM_INT, 50);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function GetUserInfosByEmail($email) {
        try {
            $stmt = Database::prepare('SELECT * FROM where_is_my_friend.users u WHERE u.email = :email');
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function Connection($email, $pwd) {

        if (UserManager::UserExist($email)) {
            $userInfo = UserManager::GetUserInfosByEmail($email);
            $pwdSalt= sha1($pwd.$userInfo[0]->salt);
            if ($email== $userInfo[0]->email &&$pwdSalt == $userInfo[0]->password) {
                echo "<script>alert('Vous êtes connecté')</script>";
            }
            else{
                echo "<script>alert('Mauvais mot de passe')</script>";
            }
     
        } else {
            echo "<script>alert('Cet email n'existe pas')</script>";
        }
    }
    

}
