<?php

/**
 * Custom helper functions
 */

$d = "0.01100";

function crop_double($double) {
    if(is_string($double)) {
        $n = str_split($double);
        $rev = array_reverse($n);
        foreach ($rev as $item) {
           if($item === '0') {
               unset($rev[$item]);
           }
            break;
        }
        $rev = array_reverse($rev);
        $rev = implode($rev);
        crop_double($rev);
        return $rev;
    }

}

function nullable($var) {
    return($var == '0');
}
var_dump(crop_double($d));