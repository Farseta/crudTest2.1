<?php 

use function PHPSTORM_META\type;

function date_convert($value)
{
    return date("j F Y, g:i a", strtotime($value));
};
function date_left($value)
{
    // $test = $value ->format('Y-m-d');
    $date1 = new DateTime($value);
    $date2 = new DateTime(date('Y-m-d'));
    $diff = $date2->diff($date1);
    if ($diff->invert != 1) {
        if ($diff->d < 30) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
    // return $diff;
    
    // return gettype($diff->d);
};
function date_left2($value)
{
    $date1 = new DateTime($value);
    $date2 = new DateTime(date('Y-m-d'));
    $diff = $date2->diff($date1);
    
    if ($diff->invert == 0) {
        if ($diff->days < 0) {
            return true; // Lebih dari 30 hari
        } else {
            return false; // Lebih dari 30 hari
        }
    } else {
        return true; // Tanggal yang diberikan lebih besar dari tanggal saat ini
    }
}


function stint($value)
{
    $integer = (int)$value;
    return $integer;
};
function time_convert($value)
{
    $waktu_akhir = date("H:i", strtotime($value . " - 7 hours"));
    return $waktu_akhir;
};
