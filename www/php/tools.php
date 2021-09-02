<?php

/**
 * Projet : Journée Sportive du CFPT - Tools
 * @author : Alexandre PINTRAND
 * @version 1.0, 01/09/2021, Initial revision
**/

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

function headTo($destination) {
    header("Location: $destination");
    exit();
}