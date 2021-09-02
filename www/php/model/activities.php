<?php

/**
 * Projet : Journée Sportive du CFPT - Database - Activities
 * @author : Alexandre PINTRAND
 * @version 1.0, 01/09/2021, Initial revision
**/

require_once 'database.php';

function addActivity($activityName) {
    try {
        $query = db()->prepare("INSERT INTO activite(nomActivite) VALUES (?)");
        $query->execute([$activityName]);
    }
    catch (PDOException $e) {
        throw $e;
    }
}

function deleteActivity($id) {
    try {
        $query = db()->prepare("DELETE FROM activite WHERE idActivite = ?");
        $query->execute([$id]);
    }
    catch (PDOException $e) {
        throw $e;
    }
}

function editActivity($id, $nomActivite) {
    try {
        $query = db()->prepare("UPDATE activite SET nomActivite = ? WHERE idActivite = ?");
        $query->execute([$nomActivite, $id]);
    }
    catch (PDOException $e) {
        throw $e;
    }
}

function getActivites() {
    try {
        $query = db()->prepare("SELECT * FROM activite");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e) {
        throw $e;
    }
}

function getActivityById($id) {
    try {
        $query = db()->prepare("SELECT * FROM activite WHERE idActivite = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e) {
        throw $e;
    }
}