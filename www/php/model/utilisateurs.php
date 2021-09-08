<?php

/**
 * Projet : Journée Sportive du CFPT - Database - Users
 * @author : Alexandre PINTRAND
 * @version 1.0, 01/09/2021, Initial revision
**/

require_once 'database.php';

function isLoginValid($username, $password) {
    try {
        $query = db()->prepare("SELECT idUtilisateur, pseudo FROM utilisateurs WHERE pseudo = ? AND motDePasse = ?");
        $query->execute([$username, hash('sha256', $password)]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e) {
        throw $e;
    }
}