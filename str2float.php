<?php

// this code is turning a string into a float with two decimal places
// review and rewrite this function in a more direct, easier to understand,
// and precise manner

function str2float($str)
{
    $len = strlen($str);
    $dot = strpos($str, ".");
    if ($dot === false) {
        $str .= ".00";
        $len = strlen($str);
        $dot = strpos($str, ".");
    }
    $first_part = substr($str, 0, $dot);
    $second_part = substr($str, $dot + 1, 2);
    if (strlen($second_part) == 1) {
        $second_part .= "0";
    }
    $val = $first_part . "." . $second_part;
    return $val;
}

