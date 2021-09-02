<?php

/**
 * Projet : Journée Sportive du CFPT - Activity Suppression
 * @author : Alexandre PINTRAND
 * @version 1.0, 01/09/2021, Initial revision
**/

require_once 'php/tools.php';
require_once 'php/model/activities.php';
require_once 'php/model/database.php';

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$action = filter_input(INPUT_POST, "action", FILTER_SANITIZE_STRING);

$activityOutput = "";

if ($id) {
    $activity = getActivityById($id);
    if ($action == "deleteActivity") {
        deleteActivity($id);
        $activityOutput = "Suppression effectuée avec succès.";
        headTo("activitiesList.php");
    }
    else if ($action == "cancel") {
        headTo("activitiesList.php");
    }   
}
else {
    headTo("activitiesList.php");
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
        <h1>Confirmation de suppression d'activité</h1>
    </header>
    <main>
        <p>Voulez-vous vraiment supprimer l'activité : <?= $activity["nomActivite"] ?>?</p>
        <form method="post">
            <button type="submit" name="action" value="deleteActivity">Supprimer</button>
            <button type="submit" name="action" value="cancel">Annuler</button>
        </form>
        <?= $activityOutput ?>
    </main>
    <footer>
        <p>Fait par Alexandre PINTRAND - I.FDA-P3C - 01/09/2021</p>
    </footer>
</body>

</html>