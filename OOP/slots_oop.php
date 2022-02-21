<?php


class Board
{
    protected array $letters;
    protected int $rows;
    protected int $columns;
    protected array $combs;
    protected array $board;
    protected int $counter = 0;

    public function __construct($letters, $rows, $columns)
    {
        $this->letters = $letters;
        $this->rows = $rows;
        $this->columns = $columns;
    }

    public function make()
    {
        for ($i = 0; $i < $this->rows; $i++) {
            $this->board[] = [];
        }
        foreach ($this->board as &$row) {
            for ($j = 0; $j < $this->columns; $j++) {
                shuffle($this->letters);
                $randLetter = $this->letters[0];
                $row[$j] = $randLetter;
                echo " " . $row[$j] . " ";
            }
            echo PHP_EOL;
        }
    }

    public function addCombos()
    {
        $this->combs = [
            [[0, 0], [0, 1], [0, 2], [0, 3]],
            [[1, 0], [1, 1], [1, 2], [1, 3]],
            [[2, 0], [2, 1], [2, 2], [0, 2]],
            [[0, 0], [1, 1], [1, 2], [2, 3]],
            [[2, 0], [1, 1], [1, 2], [0, 3]],
            [[2, 0], [1, 1], [1, 2], [2, 3]],
            [[0, 0], [1, 1], [1, 2], [0, 3]],
        ];
    }

    public function checkWin()
    {
        $results = [];
        foreach ($this->combs as $combo) {
            foreach ($combo as $c) {
                [$row, $column] = $c;
                $results[] = $this->board[$row][$column];
            }
            if (count(array_unique($results)) === 1) {
                $this->counter += 1;
                echo "Lucky you!" . PHP_EOL;
            }
            unset($results);
            $results = [];
        }
        if ($this->counter == 0) {
            return "Better luck next time!" . PHP_EOL;
        }
    }

    public function counter(): int
    {
        return $this->counter;
    }
}

class Person
{
    protected string $name;
    protected string $surname;
    protected int $tokens;

    public function __construct($name, $surname, $tokens)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->tokens = $tokens;
    }
}

$tokens = readline("Enter all of your salary! ");
while ($tokens > 0) {
    echo "Welcome to 'algas reizinātājs'!" . PHP_EOL;
    echo "You have $tokens tokens" . PHP_EOL;
    $bet = readline("Enter the bet amount or 'q' to exit : ");
    if ($bet == "q") {
        exit;
    }
    if ($bet > $tokens) {
        echo "Not enough tokens" . PHP_EOL;
    } else {
        $tokens -= $bet;
        echo PHP_EOL;

        $a = new Board(["a", "z", "x"], 3, 4);
        $a->make();
        echo PHP_EOL;
        $a->addCombos();
        $a->checkWin();
        $prize = ($bet * 2) * $a->counter();
        echo "You won : $prize tokens!!" . PHP_EOL;
        $tokens += $prize;
    }
}