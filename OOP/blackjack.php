<?php

class Cards
{
    private array $cards = [];
    private array $suits = [];
    private array $deck = [];
    private int $sumPC = 0;
    private int $sumPlayer = 0;

    public function assignSuits(): void
    {
        $this->suits = ["Clubs", "Diamonds", "Hearts", "Spades"];
    }

    public function assignCards(): void
    {
        $this->cards = ["2", "3", "4", "5", "6", "7", "8", "9", "10", "Jack", "Queen", "King", "Ace"];
    }

    public function declareValues(): void
    {
        foreach ($this->cards as $card) {
            foreach ($this->suits as $suit) {
                $this->deck[] = "$suit#$card";
            }
        }
    }

    public function getCard(): string
    {
        shuffle($this->deck);
        return $this->deck[rand(0, 51)];
    }

    public function calculatePlayerCardValue($card): string
    {
        $array = explode("#", $card);
        if (is_numeric($array[1])) {
            $this->sumPlayer += $array[1];
        } elseif ($array[1] == "Ace") {
            $this->sumPlayer += 11;
        } else {
            $this->sumPlayer += 10;
        }
        return $array[0] . "#" . $array[1];
    }

    public function getSumPlayer(): int
    {
        return $this->sumPlayer;
    }

    public function calculateDealerCardValue($card): string
    {
        $array = explode("#", $card);
        if (is_numeric($array[1])) {
            $this->sumPC += $array[1];
        } elseif ($array[1] == "Ace") {
            $this->sumPC += 11;
        } else {
            $this->sumPC += 10;
        }
        return $array[0] . "#" . $array[1];
    }

    public function getSumDealer(): int
    {
        return $this->sumPC;
    }

    public function getDeck(): array {
        return $this->deck;
    }
}

class Game
{
    public function isItOver21($num): bool
    {
        if ($num > 21) {
            return true;
        } else {
            return false;
        }
    }

//    public function getSumPlayer(): int
//    {
//        return $this->sumPlayer;
//    }
//
//    public function getSumDealer(): int
//    {
//        return $this->sumPC;
//    }

}

echo "Welcome to the BlackJack!\n";
$value = readline("press [1] to start the game! ");
if ($value == 1) {
    $play = new Cards();
    $game = new Game();
    $play->assignSuits();
    $play->assignCards();
    $play->declareValues();
    echo $play->calculatePlayerCardValue($play->getCard()) . PHP_EOL;
    echo $play->calculatePlayerCardValue($play->getCard()) . PHP_EOL;
    echo "Sum : " . $play->getSumPlayer() . PHP_EOL;
    echo "------------------------" . PHP_EOL;
    while ($play->getSumPlayer() <= 21 && $play->getSumDealer() <= 21) {
        $option = readline("press [2] to hold or [3] to pick a card! ");
        if ($option == 2) {
            echo $play->calculateDealerCardValue($play->getCard()) . PHP_EOL;
            echo $play->calculateDealerCardValue($play->getCard()) . PHP_EOL;
            echo "Sum : " . $play->getSumDealer() . PHP_EOL;
            echo "------------------------" . PHP_EOL;
            for ($j = 0; $j < 5; $j++) {
                if (21 - $play->getSumDealer() <= 4) {
                    if ($play->getSumPlayer() <= 21 && $play->getSumDealer() <= 21) {
                        $val1 = 21 - $play->getSumPlayer();
                        $val2 = 21 - $play->getSumDealer();
                        if ($val1 > $val2) {
                            echo "Dealer wins! Dealer has {$play->getSumDealer()} and Player has {$play->getSumPlayer()}";
                        } elseif ($val1 < $val2) {
                            echo "Player wins! Player has {$play->getSumPlayer()} and Dealer has {$play->getSumDealer()}";
                        } else {
                            echo "Draw!";
                        }
                        exit;
                    } elseif ($play->getSumPlayer() <= 21 && $play->getSumDealer() > 21) {
                        echo "Player wins! Player has {$play->getSumPlayer()} and Dealer has {$play->getSumDealer()}";
                        exit;
                    }
                } else {
                    echo $play->calculateDealerCardValue($play->getCard()) . PHP_EOL;
                    echo "Sum : " . $play->getSumDealer() . PHP_EOL;
                    echo "------------------------" . PHP_EOL;
                    if ($game->isItOver21($play->getSumDealer())) {
                        echo "Player wins! Player has {$play->getSumPlayer()} and Dealer has {$play->getSumDealer()}";
                        exit;
                    }
                }
            }
        } elseif ($option == 3) {
            echo $play->calculatePlayerCardValue($play->getCard()) . PHP_EOL;
            echo "Sum : " . $play->getSumPlayer() . PHP_EOL;
            echo "------------------------" . PHP_EOL;
            if ($game->isItOver21($play->getSumPlayer())) {
                echo "Dealer wins! Player has {$play->getSumPlayer()}";
                exit;
            }
        }
    }
}


