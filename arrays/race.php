<?php

$players = 3;
$winners = [];

$run = array_fill(0, $players, array_fill(0, 15, "-"));

for ($x = 0; $x < $players; $x++) {
    $run[$x][0] = "X";
}

for ($y = 0; $y < 12; $y++) {
    foreach($run as $index => $val) {
        echo "Player [" . $index . "]";
        foreach($val as $valMore) {
            echo " $valMore";
        }
        echo PHP_EOL . PHP_EOL;
    }

    sleep(1);

    foreach($run as $index => $val) {
        $x = array_search("X", $val);

        if ($x == 14) {
            $winners[$y][] = $index;
            continue;
        }
        if ($x == 13) {
            $howFar = $x + 1;
        } else {
            $howFar = $x + rand(1, 2);
        }
        $run[$index][$howFar] = "X";
        $run[$index][$x] = "-";
    }
}


