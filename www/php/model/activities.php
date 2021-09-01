<?php

/**
 * Projet : Journée Sportive du CFPT - Database - Activities
 * @author : Alexandre PINTRAND
 * @version 1.0, 01/09/2021, Initial revision
**/

require_once 'database.php';

function getActivites() {
    $query = db()->prepare("SELECT nomActivite FROM activite");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}