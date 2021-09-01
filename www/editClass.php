<?php

/**
 * Projet : Journée Sportive du CFPT - Class Edition
 * @author : Alexandre PINTRAND
 * @version 1.0, 01/09/2021, Initial revision
**/

require_once 'php/tools.php';
require_once 'php/model/classes.php';
require_once 'php/model/database.php';

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

