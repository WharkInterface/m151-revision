<?php

/**
 * Projet : Journée Sportive du CFPT - Database - Students
 * @author : Alexandre PINTRAND
 * @version 1.0, 01/09/2021, Initial revision
**/

require_once 'database.php';

function inscrireEleveActivite($lastName, $firstName, $idClass, $firstActivity, $secondActivity, $thirdActivity) {
    try {
        db()->beginTransaction();

        $query = db()->prepare("INSERT INTO eleve (nom, prenom, idClasse) VALUES (?, ?, ?)");
        $query->execute([$lastName, $firstName, $idClass]);

        $idEleve = db()->lastInsertId();

        $query = db()->prepare("INSERT INTO inscrire (idActivite, idEleve, ordre) VALUES (?, ?, ?)");
        $query->execute([$firstActivity, $idEleve, 1]);

        $query = db()->prepare("INSERT INTO inscrire (idActivite, idEleve, ordre) VALUES (?, ?, ?)");
        $query->execute([$secondActivity, $idEleve, 2]);

        $query = db()->prepare("INSERT INTO inscrire (idActivite, idEleve, ordre) VALUES (?, ?, ?)");
        $query->execute([$thirdActivity, $idEleve, 3]);

        db()->commit();
    }
    catch (PDOException $e) {
        throw $e;

        db()->rollback();
    }
}