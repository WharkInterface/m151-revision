<?php

/**
 * Projet : Journée Sportive du CFPT - Activity Suppression
 * @author : Alexandre PINTRAND
 * @version 1.0, 01/09/2021, Initial revision
**/

require_once 'php/tools.php';
require_once 'php/model/activities.php';
require_once 'php/model/database.php';

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

