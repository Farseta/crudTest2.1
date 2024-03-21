<?php

use function PHPSTORM_META\type;

function date_convert($value){
    return date("F j, Y, g:i a", strtotime($value));
};
function date_left($value){
    // $test = $value ->format('Y-m-d');
    $date1 = new DateTime($value);
    $date2 = new DateTime(date('Y-m-d'));
    $diff = $date2->diff($date1);
    if ($diff->invert !=1){
        if ($diff->d <14){
            return true;
        }
        else{
            return false;
        }
    }
    else{
        return false;
    }
    // return $diff;
    
    // return gettype($diff->d);
};
function stint($value){
    $integer = (int)$value;
    return $integer;
};
?>