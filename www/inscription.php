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

$dbClasses = getClasses();
$dbActivities = getActivites();

$classes = [];
$activities = [];

foreach ($dbClasses as $class) {
    $classes[] = $class["nomClasse"];
}

foreach ($dbActivities as $activity) {
    $activities[] = $activity["nomActivite"];
}

$surname = filter_input(INPUT_POST, "surname", FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
$class = filter_input(INPUT_POST, "class", FILTER_SANITIZE_STRING);
$firstActivity = filter_input(INPUT_POST, "firstActivity", FILTER_SANITIZE_STRING);
$secondActivity = filter_input(INPUT_POST, "secondActivity", FILTER_SANITIZE_STRING);
$thirdActivity = filter_input(INPUT_POST, "thirdActivity", FILTER_SANITIZE_STRING);

$action = filter_input(INPUT_POST, "action", FILTER_SANITIZE_STRING);

$output = "";

if ($action == "confirm") {
    if ($surname && $name && $class && $firstActivity && $secondActivity && $thirdActivity) {
        $output = "Nom : $surname <br> Prénom : $name <br> Classe : $class <br> Choix 1 : $firstActivity <br> Choix 2 : $secondActivity <br> Choix 3 : $thirdActivity";
    }
    else {
        $output = "Vérifiez que tous les champs soient complets.";
    }
}
else if ($action == "cancel") {
    $surname = "";
    $name = "";
    $class = "";
    $firstActivity = "";
    $secondActivity = "";
    $thirdActivity = "";
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
        <h1>Inscription à la journée sportive du CFPT</h1>
    </header>
    <main>
        <form method="post">
            <div>
                <div>
                    <label for="surname">Nom</label>
                    <input type="text" name="surname" id="surname" value="<?= $surname ?>">
                </div>
                <div>
                    <label for="name">Prénom</label>
                    <input type="text" name="name" id="name" value="<?= $name ?>">
                </div>
                <div>
                    <label for="class">Classe</label>
                    <?php displayStickySelect("class", $classes, $class); ?>
                </div>
            </div>
            <div>
                <div>
                    <label for="firstActivity">Premier choix :</label>
                    <?php displayStickySelect("firstActivity", $activities, $firstActivity); ?>
                </div>
                <div>
                    <label for="secondActivity">Deuxième choix :</label>
                    <?php displayStickySelect("secondActivity", $activities, $secondActivity); ?>
                </div>
                <div>
                    <label for="thirdActivity">Troisième choix :</label>
                    <?php displayStickySelect("thirdActivity", $activities, $thirdActivity); ?>
                </div>
            </div>
            <button type="submit" name="action" value="confirm">Confirmer</button>
            <button type="submit" name="action" value="cancel">Annuler</button>
        </form>
        <?= $output ?>
    </main>
    <footer>
        <p>Fait par Alexandre PINTRAND - I.FDA-P3C - 01/09/2021</p>
    </footer>
</body>

</html>