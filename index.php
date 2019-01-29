<!DOCTYPE html>
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
            echo "<script>alert('Votre inscription c\'est bien déroulé')</script>";
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
            echo "<script>alert('Votre inscription c\'est bien déroulé')</script>";
        }
        else{
            echo "<script>alert('Cet email existe déjà')</script>";
        }
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $salt = uniqid(mt_rand(), true);
        echo $salt ;
        if(UserManager::AddUser("Jonathane@gmail.comd", sha1("pomme"), "Borel-Jaquet", "Jonathan", "Rue de Fremis 47, 1241 Puplinge"))
        {
            echo "Good";
        }
        else{
            echo 'Nop';
        }
        UserManager::GetAllUser();
        ?>
        <form action="#" method="POST">
            <fieldset>
                <legend>Inscription</legend>
                <table>
                    <tr>
                        <td>Adresse email :</td>
                        <td><input type="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Mot de passe :</td>
                        <td><input type="password" name="pwd" required></td>
                    </tr>
                    <tr>
                        <td>Nom :</td>
                        <td><input type="text" name="firstName" value="<?php if (isset($_POST['firstName'])) echo $_POST['firstName']; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Prénom :</td>
                        <td><input type="text" name="secondName" value="<?php if (isset($_POST['secondName'])) echo $_POST['secondName']; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Adresse :</td>
                        <td><input type="text" name="adress" value="<?php if (isset($_POST['adress'])) echo $_POST['adress']; ?>" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="connection"></td>
                    </tr>
                    
                </table>
            </fieldset>
        </form>
        <form action="#" method="POST">
            <fieldset>
                <legend>Connexion</legend>
                <table>
                    <tr>
                        <td>Adresse email :</td>
                        <td><input type="email" name="emailLog" value="<?php if (isset($_POST['emailLog'])) echo $_POST['emailLog']; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Mot de passe :</td>
                        <td><input type="password" name="pwdLog" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="connectionLog"></td>
                    </tr>
                </table>
            </fieldset>
        </form>
        
    </body>
</html>