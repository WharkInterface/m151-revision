<?php

/**
 * Projet : Journée Sportive du CFPT - Database - Activities
 * @author : Alexandre PINTRAND
 * @version 1.0, 01/09/2021, Initial revision
**/

require_once 'database.php';

function addClass($className) {
    try {
        $query = db()->prepare("INSERT INTO classe (nomClasse) VALUES (?)");
        $query->execute([$className]);
    }
    catch (PDOException $e) {
        throw $e;
    }
}

function deleteClass($id) {
    try {
        $query = db()->prepare("DELETE FROM classe WHERE idClasse = ?");
        $query->execute([$id]);
    }
    catch (PDOException $e) {
        throw $e;
    }
}

function editClass($id, $nomClasse) {
    try {
        $query = db()->prepare("UPDATE classe SET nomClasse = ? WHERE idClasse = ?");
        $query->execute([$nomClasse, $id]);
    }
    catch (PDOException $e) {
        throw $e;
    }
}

function getClassById($id) {
    try {
        $query = db()->prepare("SELECT * FROM classe WHERE idClasse = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e) {
        throw $e;
    }
}

function getClasses() {
    try {
        $query = db()->prepare("SELECT * FROM classe");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e) {
        throw $e;
    }
}