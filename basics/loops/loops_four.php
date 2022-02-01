<?php

$array = [
    2,
    3,
    5,
    6,
    9,
    11
];
for ($y = 0; $y < count($array); $y++) {
    if ($array[$y] % 3 == 0) {
        echo "\n$array[$y]";
    }
}
