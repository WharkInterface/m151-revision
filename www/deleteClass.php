<?php

/**
 * Projet : Journée Sportive du CFPT - Class Suppression
 * @author : Alexandre PINTRAND
 * @version 1.0, 01/09/2021, Initial revision
**/

require_once 'php/tools.php';
require_once 'php/model/classes.php';
require_once 'php/model/database.php';

if (!userIsConnected()) {
    headTo("inscription.php");
}

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$action = filter_input(INPUT_POST, "action", FILTER_SANITIZE_STRING);

$classOutput = "";

if ($id) {
    $class = getClassById($id);
    if ($action == "deleteClass") {
        deleteClass($id);
        $classOutput = "Suppression effectuée avec succès.";
        headTo("classeslist.php");
    }
    else if ($action == "cancel") {
        headTo("classeslist.php");
    }   
}
else {
    headTo("classeslist.php");
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
        <h1>Confirmation de suppression de classe</h1>
    </header>
    <main>
        <p>Voulez-vous vraiment supprimer la classe : <?= $class["nomClasse"] ?>?</p>
        <form method="post">
            <button type="submit" name="action" value="deleteClass">Supprimer</button>
            <button type="submit" name="action" value="cancel">Annuler</button>
        </form>
        <?= $classOutput ?>
    </main>
    <footer>
        <p>Fait par Alexandre PINTRAND - I.FDA-P3C - 01/09/2021</p>
    </footer>
</body>

</html>