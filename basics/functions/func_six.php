<?php

$anotherArray = [
    23,
    "hello",
    13,
    54.24,
    73
];

for ($i = 0; $i < count($anotherArray); $i++) {
    echo double($anotherArray[$i]);
}
function double($value) {
    if (is_int($value)) {
        return $value * 2;
    } else {
        return "\nnot an integer" . PHP_EOL;
    }
}
