<?php

/**
 * Projet : Journée Sportive du CFPT - Class Edition
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
}
else {
    headTo("classeslist.php");
}

if ($action == "editClass") {
        $class["nomClasse"] = filter_input(INPUT_POST, "className", FILTER_SANITIZE_STRING);
        if ($class["nomClasse"]) {
            editClass($id, $class["nomClasse"]);
            $classOutput = "La classe a bien été modifié.";
        }
        else {
            $classOutput = "Nom de la classe erroné.";
        }
}
else if ($action == "cancel") {
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
        <h1>Modification de la classe</h1>
    </header>
    <main>
        <form method="post">
            <fieldset>
                <div>
                    <label for="className">Nom de la classe : </label>
                    <input type="text" name="className" id="className" value="<?= $class["nomClasse"] ?>">
                </div>
                <?= $classOutput ?>
                <button type="submit" name="action" value="editClass">Éditer</button>
                <button type="submit" name="action" value="cancel">Retour</button>
            </fieldset>
        </form>
    </main>
    <footer>
        <p>Fait par Alexandre PINTRAND - I.FDA-P3C - 01/09/2021</p>
    </footer>
</body>

</html>