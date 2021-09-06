<?php

/**
 * Projet : Journée Sportive du CFPT - Login
 * @author : Alexandre PINTRAND
 * @version 1.0, 01/09/2021, Initial revision
**/

require_once 'php/tools.php';
require_once 'php/model/utilisateurs.php';

if (userIsConnected()) {
    gotoPage("inscription.php");
}

$action = filter_input(INPUT_POST, "action", FILTER_SANITIZE_STRING);

$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

$output = "";

if ($action == "connect") {
    if (isLoginValid($username, $password)) {
        $_SESSION = isLoginValid($username, $password);
        $output = "Connexion réussie avec succès.";
        headTo("admin.php");
    }
    else {
        $output = "Identifiants incorrect.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journée Sportive du CFPT</title>
</head>
<body>
    <header>
        <h1>Inscription à la journée sportive du CFPT</h1>
    </header>
    <main>
        <form method="post">
            <div>
                <label for="username">Pseudo : </label>
                <input type="text" name="username" id="username">
            </div>
            <div>
                <label for="password">Mot de passe : </label>
                <input type="password" name="password" id="password">
            </div>
            <button name="action" value="connect">Se connecter</button>
        </form>
    </main>
    <footer>
        <p>Fait par Alexandre PINTRAND - I.FDA-P3C - 01/09/2021</p>
    </footer>
</body>
</html>