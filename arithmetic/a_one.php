<?php

function one($int, $int2): string {
    if (is_int($int) && is_int($int2)) {
        if (($int == 15 || $int2 == 15) || ($int + $int2 == 15 || $int - $int2 == 15 || $int2 - $int == 15)) {
            return "true";
        } else {
            return "false";
        }
    } else {
        return "enter an integer";
    }
}
echo one(15, 2);