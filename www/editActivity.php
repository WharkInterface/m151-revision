<?php

/**
 * Projet : Journée Sportive du CFPT - Activity Edition
 * @author : Alexandre PINTRAND
 * @version 1.0, 01/09/2021, Initial revision
**/

require_once 'php/tools.php';
require_once 'php/model/activities.php';
require_once 'php/model/database.php';

if (!userIsConnected()) {
    headTo("inscription.php");
}

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$action = filter_input(INPUT_POST, "action", FILTER_SANITIZE_STRING);

$activityOutput = "";

if ($id) {
    $activity = getActivityById($id);
}
else {
    headTo("activitieslist.php");
}

if ($action == "editActivity") {
        $activity["nomActivite"] = filter_input(INPUT_POST, "activityName", FILTER_SANITIZE_STRING);
        if ($activity["nomActivite"]) {
            editActivity($id, $activity["nomActivite"]);
            $activityOutput = "L'activité a bien été modifié.";
        }
        else {
            $activityOutput = "Nom de l'activité erroné.";
        }
}
else if ($action == "cancel") {
    headTo("activitieslist.php");
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
        <h1>Modification de l'activité</h1>
    </header>
    <main>
        <form method="post">
            <fieldset>
                <div>
                    <label for="activityName">Nom de l'activité : </label>
                    <input type="text" name="activityName" id="activiteName" value="<?= $activity["nomActivite"] ?>">
                </div>
                <?= $activityOutput ?>
                <button type="submit" name="action" value="editActivity">Éditer</button>
                <button type="submit" name="action" value="cancel">Retour</button>
            </fieldset>
        </form>
    </main>
    <footer>
        <p>Fait par Alexandre PINTRAND - I.FDA-P3C - 01/09/2021</p>
    </footer>
</body>

</html>