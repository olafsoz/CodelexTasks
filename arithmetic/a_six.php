<?php

function cozaLozaWoza($int) {
    for ($i = 1; $i <= $int; $i++) {
        if ($i % 7 === 0 && $i % 5 === 0 && $i % 3 === 0) {
            echo 'cozalozawoza ';
        } else if ($i % 5 === 0 && $i % 3 === 0) {
            echo 'cozaloza ';
        } else if ($i % 7 === 0) {
            echo 'woza ';
        } else if ($i % 5 === 0) {
            echo 'loza ';
        } else if ($i % 3 === 0) {
            echo 'coza ';
        } else {
            echo $i . " ";
        }
        if ($i % 11 === 0) {
            echo PHP_EOL;
        }
    }
}
cozaLozaWoza(110);