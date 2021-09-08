<?php

/**
 * Projet : Journée Sportive du CFPT - Tools
 * @author : Alexandre PINTRAND
 * @version 1.0, 01/09/2021, Initial revision
**/

initSession();

function initSession() {
    session_start();

    if (!isset($_SESSION['pseudo'])) {
        $_SESSION = [
            'pseudo' => false
        ];
    }
}

function displayStickySelect($name, $list, $previousChoice) {
    echo '<select name="'.$name.'">';
    foreach($list as $value) {
        if ($previousChoice == $value) {
        echo '<option value="'.$value.'" selected>'.$value.'</option>';
        }
        else {
            echo '<option value="'.$value.'">'.$value.'</option>';
        }
    } 
    echo '</select>';
}

function displayStickySelectWithKeys($name, $list, $previousChoice) {
    echo '<select name="'.$name.'">';
    $html = "";
                    
    foreach($list as $idItem => $oneItem) {
        $selected = $idItem == $previousChoice ? 'selected' : '';
        $html .= "<option value=\"$idItem\" $selected>$oneItem</option>\n";
    }

    echo $html;
    echo '</select>';
}

function headTo($destination) {
    header("Location: $destination");
    exit();
}

function getUser() {
    return $_SESSION['pseudo'];
}

function userIsConnected() {
    return getUser() !== false;
}