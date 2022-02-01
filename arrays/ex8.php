<?php


$letters = ["a", "b", "c"];

$board = [];
$rowsTimes = 3;
$colsTimes = 3;

$combinations = [
    [
        [0, 0], [0, 1], [0, 2]
    ],
    [
        [1, 0], [1, 1], [1, 2]
    ],
    [
        [2, 0], [2, 1], [2, 2]
    ],
    [
        [0, 0], [1, 1], [2, 2]
    ],
    [
        [0, 2], [1, 1], [2, 0]
    ]
];

function win($board, $combinations, $bet, &$tokens)
{
    $results = [];
    $counter = 0;
    foreach ($combinations as $combination) {
        foreach ($combination as $combo) {
            [$row, $column] = $combo;
            $results[] = $board[$row][$column];
        }
        if (count(array_unique($results)) === 1) {
            $counter += 1;
            echo "Lucky you!" . PHP_EOL;
        }
        unset($results);
        $results = [];
    }
    $prize = ($bet * 2) * $counter;
    echo "You won : $prize tokens" . PHP_EOL;
    $tokens += $prize;
    if ($counter == 0) {
        return "Better luck next time!" . PHP_EOL;
    }
}

$tokens = 1000;
while ($tokens > 0) {
    echo "Welcome to 'algas reizinātājs'!" . PHP_EOL;
    echo "You have $tokens tokens" . PHP_EOL;
    $bet = (int)readline("Enter the bet amount or 'q' to exit ");
    if ($bet == "q") {
        exit;
    }
    if ($bet > $tokens) {
        echo "Not enough tokens" . PHP_EOL;
    } else {
        $tokens -= $bet;
        echo PHP_EOL;

        unset($board);
        $board = [];
        for ($i = 0; $i < $rowsTimes; $i++) {
            $board[] = [];
        }
        foreach ($board as &$row) {
            for ($j = 0; $j < $colsTimes; $j++) {
                shuffle($letters);
                $randLetter = $letters[0];
                $row[$j] = $randLetter;
                echo " " . $row[$j] . " ";
            }
            echo PHP_EOL;
        }
        echo PHP_EOL;
    }
    echo win($board, $combinations, $bet, $tokens);
}




