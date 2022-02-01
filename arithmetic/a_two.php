<?php

function checkOddEven($int): string {
    if (is_numeric($int)) {
        if ($int % 2 == 0) {
            return "$int is even\nBye!";
        } else if ($int % 2 == 1) {
            return "$int is odd\nBye!";
        } else {
            return "how did you get here?";
        }
    } else {
        return "Enter a numeric value\nBye!";
    }
}
echo checkOddEven(8);