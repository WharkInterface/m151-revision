<?php

/**
 * Projet : Journée Sportive du CFPT - Liste Activités
 * @author : Alexandre PINTRAND
 * @version 1.0, 01/09/2021, Initial revision
**/

require_once 'php/tools.php';
require_once 'php/model/activities.php';
require_once 'php/model/database.php';

$dbActivities = getActivites();

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
        <h1>Liste des activités</h1>
    </header>
    <main>
        <table>
            <tr>
                <th>ID</th>
                <th>Nom</th>
            </tr>
            <?php

            foreach ($dbActivities as $activity) { ?>
                <tr>
                    <td><?= $activity["idActivite"] ?></td>
                    <td><?= $activity["nomActivite"] ?></td>
                    <td><a href="editactivity.php?id=<?= $activity["idActivite"]?>">Éditer</a></td>
                    <td><a href="deleteactivity.php?id=<?= $activity["idActivite"]?>">Supprimer</a></td>
                </tr>
            <?php } ?>
        </table>
        <a href="admin.php">Retour</a>
    </main>
    <footer>
        <p>Fait par Alexandre PINTRAND - I.FDA-P3C - 01/09/2021</p>
    </footer>
</body>
</html>