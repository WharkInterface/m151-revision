<?php

/**
 * Projet : Journée Sportive du CFPT - Database - Activities
 * @author : Alexandre PINTRAND
 * @version 1.0, 01/09/2021, Initial revision
**/

require_once 'database.php';

function getActivites() {
    $query = db()->prepare("SELECT * FROM activite");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function addActivity($activityName) {
    $query = db()->prepare("INSERT INTO activite(nomActivite) VALUES (?)");
    $query->execute([$activityName]);
}

function getActivityById($id) {
    $query = db()->prepare("SELECT * FROM activite WHERE idActivite = ?");
    $query->execute([$id]);
    return $query->fetch(PDO::FETCH_ASSOC);
}