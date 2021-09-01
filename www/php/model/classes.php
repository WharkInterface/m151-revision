<?php

/**
 * Projet : Journée Sportive du CFPT - Database - Activities
 * @author : Alexandre PINTRAND
 * @version 1.0, 01/09/2021, Initial revision
**/

require_once 'database.php';

function getClasses() {
    $query = db()->prepare("SELECT * FROM classe");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function addClass($className) {
    $query = db()->prepare("INSERT INTO classe (nomClasse) VALUES (?)");
    $query->execute([$className]);
}

function getClassById($id) {
    $query = db()->prepare("SELECT * FROM classe WHERE idClasse = ?");
    $query->execute([$id]);
    return $query->fetch(PDO::FETCH_ASSOC);
}