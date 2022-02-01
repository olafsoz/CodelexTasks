<?php

$value2 = ["rock", "paper", "scissors", "lizard", "spock"];
$counter = 0;
$player = 0;
$computer = 0;
$winningCombos = [
//    "rock" => "scissors",
//    "paper" => "rock",
//    "scissors" => "paper",

    "rock" => ["scissors", "lizard"],
    "paper" => ["rock", "spock"],
    "scissors" => ["paper", "lizard"],
    "lizard" => ["spock", "paper"],
    "spock" => ["scissors", "rock"]

];
while($counter < 10) {
    echo "The player : " . $player . PHP_EOL;
    echo "The computer : " . $computer . PHP_EOL;
    $value1 = readline("Enter 'rock', 'paper', 'scissors', 'lizard' or 'spock'. Or 'q' to exit ");
    $value = strtolower($value1);
    if ($value === "q") {
        exit;
    }
    echo "You picked $value" . PHP_EOL;
    $word = shuffle($value2);
    $word = $value2[0];
    echo "The computer picked $word" . PHP_EOL;
    if ($value === $word) {
        echo "Tie" . PHP_EOL;
    } else {
        foreach($winningCombos as $key => $val) {
            if ($value == $key && $word == $val[0] || $value == $key && $word == $val[1]) {
                echo "The player won!" . PHP_EOL;
                $player += 1;
                break;
            } else if ($word == $key && $value == $val[0] || $value == $key && $word == $val[1]) {
                echo "The computer won!" . PHP_EOL;
                $computer += 1;
                break;
            }
        }
        $counter += 1;
        echo "Gājieni bijuši : $counter" . PHP_EOL . PHP_EOL;
    }
}