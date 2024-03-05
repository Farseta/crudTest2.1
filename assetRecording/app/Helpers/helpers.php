<?php
function date_convert($value){
    return date("F j, Y, g:i a", strtotime($value));
};
?>