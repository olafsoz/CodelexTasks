<?php

function fact($num): string{
    $factorial = 1;
    for ($x = $num; $x >= 1; $x--) {
        $factorial = $factorial * $x;
    }
    return "Factorial of $num is $factorial";
}
echo fact (10);