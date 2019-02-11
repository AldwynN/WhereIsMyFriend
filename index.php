<?php
require_once './server/manager/userManager.php';
if (isset($_POST["connection"])) {
    if (isset($_POST["email"])&&isset($_POST["pwd"])&&isset($_POST["firstName"])&&isset($_POST["secondName"])&&isset($_POST["adress"])) {
        $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
        $pwd = filter_var($_POST["pwd"], FILTER_SANITIZE_STRING);
        $firstName = filter_var($_POST["firstName"], FILTER_SANITIZE_STRING);
        $secondName = filter_var($_POST["secondName"], FILTER_SANITIZE_STRING);
        $adress = filter_var($_POST["adress"], FILTER_SANITIZE_STRING);
        if(UserManager::AddUser($email, $pwd, $firstName, $secondName, $adress))
        {
            echo "<script>alert('Votre inscription s\'est bien déroulé')</script>";
        }
        else{
            echo "<script>alert('Cet email existe déjà')</script>";
        }
    }
}
if (isset($_POST["connectionLog"])) {
    if (isset($_POST["emailLog"])&&isset($_POST["pwdLog"])) {
        $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
        $pwd = filter_var($_POST["pwd"], FILTER_SANITIZE_STRING);
        //JETAIS ENTRAIN DE FAIRE CA
        if(UserManager::AddUser($email, $pwd, $firstName, $secondName, $adress))
        {
            echo "<script>alert('Votre inscription s\'est bien déroulé')</script>";
        }
        else{
            echo "<script>alert('Cet email existe déjà')</script>";
        }
    }
}
?>