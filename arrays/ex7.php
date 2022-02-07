<?php
//$board = [
//    ['-', '-', '-'],
//    ['-', '-', '-'],
//    ['-', '-', '-'],
//];
$board = [];
$combinations = [];
$gameFile = file_get_contents("default.txt");
$newLines = explode("
", $gameFile);
$boardFile = explode(" ", $newLines[0]);
$boardSize = str_split($boardFile[1]);

for ($i = 0; $i < $boardSize[0]; $i++) {
    $board[] = [];
}
foreach ($board as &$b) {
    for ($j = 0; $j < $boardSize[2]; $j++) {
        $b[$j] = "-";
    }
}

$comboFile = explode("|", $newLines[1]);
foreach ($comboFile as $index => $split) {
    $x = explode(";", $split);
    $combinations[] = $x;
}
foreach ($combinations as $index1 => $pos1) {
    foreach ($pos1 as $index2 => $pos2) {
        $combinations[$index1][$index2] = str_split($pos2);
    }
}

$player1 = readline('Enter a symbol ');
$player2 = readline('Enter a symbol ');

$activePlayer = $player1;

//$combinations = [
//    [
//        [0, 0], [0, 1], [0, 2]
//    ],
//    [
//        [1, 0], [1, 1], [1, 2]
//    ],
//    [
//        [2, 0], [2, 1], [2, 2]
//    ],
//    [
//        [0, 0], [1, 0], [2, 0]
//    ],
//    [
//        [0, 1], [1, 1], [2, 1]
//    ],
//    [
//        [0, 2], [1, 2], [2, 2]
//    ],
//    [
//        [0, 0], [1, 1], [2, 2]
//    ],
//    [
//        [0, 2], [1, 1], [2, 0]
//    ]
//];

function winnerWinnerChickenDinner(array $combinations, array $board, string $activePlayer): bool
{
    foreach ($combinations as $combination) {
        foreach ($combination as $item)
        {
            [$row, $column] = $item;
            if ($board[$row][$column] !== $activePlayer) {
                break;
            }

            if (end($combination) === $item) {
                return true;
            }
        }
    }

    return false;
}

function isBoardFull(array $board): bool
{
    foreach ($board as $row) {
        if (in_array('-', $row)) return false;
    }
    return true;
}

function printBoard($board) {
    foreach ($board as $row) {
        foreach($row as $slot) {
            echo $slot . " ";
        }
        echo PHP_EOL;
    }
}

while (!isBoardFull($board) && !winnerWinnerChickenDinner($combinations, $board, $activePlayer)) {
    printBoard($board);
    echo $activePlayer . " turn" . PHP_EOL;
    $position = readline('Enter position or \'q\' to exit ');
    if ($position === 'q') {
        exit;
    }
    [$row, $column] = explode(', ', $position);

    if (!isset($board[$row][$column]) || $board[$row][$column] !== '-') {
        echo 'Invalid position.' . PHP_EOL;
        continue;
    }

    $board[$row][$column] = $activePlayer;

    if (winnerWinnerChickenDinner($combinations, $board, $activePlayer))
    {
        printBoard($board);
        echo 'Winner is ' . $activePlayer;
        echo PHP_EOL;
        exit;
    }
    $activePlayer = $player1 === $activePlayer ? $player2 : $player1;
}

echo 'The game was tied.';
echo PHP_EOL;