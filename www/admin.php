<?php

/**
 * Projet : Journée Sportive du CFPT - Inscription
 * @author : Alexandre PINTRAND
 * @version 1.0, 01/09/2021, Initial revision
**/

require_once 'php/tools.php';
require_once 'php/model/activities.php';
require_once 'php/model/classes.php';
require_once 'php/model/database.php';

if (!userIsConnected()) {
    headTo("inscription.php");
}

$activityName = filter_input(INPUT_POST, "activityName", FILTER_SANITIZE_STRING);
$className = filter_input(INPUT_POST, "className", FILTER_SANITIZE_STRING);

$activityOutput = "";
$classOutput = "";

$action = filter_input(INPUT_POST, "action", FILTER_SANITIZE_STRING);

if ($action == "addActivity") {
    if ($activityName) {
        addActivity($activityName);
        $activityOutput = "L'activité $activityName a été ajouté à la liste des activités.";
    }
    else {
        $activityOutput = "Veuillez indiquer un nom d'activité.";
    }
} else if ($action == "addClass") {
    if ($className) {
        addClass($className);
        $classOutput = "La classe $className a été ajouté à la liste des classes.";
    }
    else {
        $classOutput = "Veuillez indiquer un nom de classe.";
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
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1>Panneau d'administration</h1>
    </header>
    <main>
        <form method="post">
            <fieldset>
                <legend>Ajout d'activité</legend>
                <div>
                    <label for="activityName">Nom de l'activité : </label>
                    <input type="text" name="activityName" id="activiteName">
                </div>
                <?= $activityOutput ?>
                <button type="submit" name="action" value="addActivity">Ajouter</button>
            </fieldset>
        </form>
        <form method="post">
            <fieldset>
                <legend>Ajout de classe</legend>
                <div>
                    <label for="className">Nom de la classe : </label>
                    <input type="text" name="className" id="className">
                </div>
                <?= $classOutput ?>
                <button type="submit" name="action" value="addClass">Ajouter</button>
            </fieldset>
            <a href="activitieslist.php">Liste des activités</a>
            <a href="classeslist.php">Liste des classes</a>
        </form>
    </main>
    <footer>
        <p>Fait par Alexandre PINTRAND - I.FDA-P3C - 01/09/2021</p>
    </footer>
</body>

</html>