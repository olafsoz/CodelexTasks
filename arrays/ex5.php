<?php

$grid = [
    ["-", "-", "-"],
    ["-", "-", "-"],
    ["-", "-", "-"]
];

$user = 1;
$turns = 0;
function printBoard($grid) {
    foreach ($grid as $row) {
        foreach($row as $slot) {
            echo $slot . " ";
        }
        echo PHP_EOL;
    }
}

function quit($input): bool {
    if (strtolower($input) === "q" || $input == null) {
        echo "Thanks for playing";
        return True;
    } else {
        return False;
    }
}

function checkInput($input): bool {
    if (is_float($input)) {
        return False;
    }
    $input = (int) $input;
    if (!isNumber($input)) {
        return False;
    }
    if (!bounds($input)) {
        return False;
    }
    return True;
}

function isNumber($input): bool {
    if (!is_numeric($input)) {
        echo "Not a valid number" . PHP_EOL;
        return False;
    } else {
        return True;
    }
}

function bounds($input): bool {
    if ($input >= 1 && $input <= 9) {
        return True;
    } else {
        echo "This number is out of bounds \n";
        return False;
    }
}

function isTaken($coords, $grid): bool {
    $row = $coords[0];
    $col = $coords[1];
    if ($grid[$row][$col] != "-") {
        echo "This position is already taken!" . PHP_EOL;

        return True;
    } else {
        return False;
    }
}

function coordinatesCol($input): int {
    $col = $input;
    if ($col > 2) {
        $col = (int) floor($col % 3);
    } else {
        return $col;
    }
    return $col;
}

function coordinatesRow($input): int {
    return (int)floor($input / 3);
}

function addToBoard($coords, &$grid, $activeUser) {
    $row = $coords[0];
    $col = $coords[1];
    $grid[$row][$col] = $activeUser;
}

function currentUser($user): string {
    if ($user == 1 || $user == 3 || $user == 5 || $user == 7 || $user == 9) {
        return "X";
    } else {
        return "O";
    }
}

function checkRow($user, $grid): bool {
    foreach ($grid as $row) {
        $completeRow = True;
        foreach($row as $slot) {
            if ($slot != $user) {
                $completeRow = False;
                break;
            }
        }
        if ($completeRow) {
            return True;
        }
    }
    return False;
}

function checkColumn($user, $grid): bool {
    for ($col = 0; $col < 3; $col ++) {
        $completeCol = True;
        for ($row = 0; $row < 3; $row++) {
            if ($grid[$row][$col] != $user) {
                $completeCol = False;
                break;
            }
        }
        if ($completeCol) {
            return True;
        }
    }
    return False;
}

function checkDiag($user, $grid): bool {
    if ($grid[0][0] == $user && $grid[1][1] == $user && $grid[2][2] == $user) {
        return True;
    } else if ($grid[0][2] == $user && $grid[1][1] && $grid[2][0] == $user) {
        return True;
    } else {
        return False;
    }
}

function win($user, $grid): bool {
    if (checkRow($user, $grid)) {
        return True;
    }
    if (checkColumn($user, $grid)) {
        return True;
    }
    if (checkDiag($user, $grid)) {
        return True;
    }
    return False;
}

while ($turns < 9) {
    $activeUser = currentUser($user);
    printBoard($grid);
    if ($user % 2 == 0) {
        echo "O turn " . PHP_EOL;
    } else {
        echo "X turn " . PHP_EOL;
    }
    $input = readline("Please enter 1 through 9 or \"q\" to quit ");
    if (quit($input)) {
        exit;
    }
    if (!checkInput($input)) {
        echo "Please try again" . PHP_EOL;
    } else {
        $input = (int)$input - 1;
        $coords = [];
        $coords[] = coordinatesRow($input);
        $coords[] = coordinatesCol($input);
        if (isTaken($coords, $grid)) {
            echo "Please try again" . PHP_EOL;
        } else {
            echo addToBoard($coords, $grid, $activeUser);
            if (win($activeUser, $grid)) {
                printBoard($grid);
                echo $activeUser . " " . "Won!";
                break;
            }
            $user += 1;
            $turns += 1;
            if ($turns == 9) {
                printBoard($grid);
                echo "The game is a tie!";
            }
        }
    }
}
