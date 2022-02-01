<?php

function randomGuess() {
    $number = rand(1, 100);
    echo "I am thinking of a number between 1 and 100, try to guess it!";
    $val = readline("\nGuess(1-100) : ");
    if ($val == $number) {
        return "You guessed it, what are the odds??";
    } else if ($val > $number) {
        return "Too high. I was thinking of $number";
    } else if ($val < $number) {
        return "Too low. I was thinking of $number";
    }
}
echo randomGuess();