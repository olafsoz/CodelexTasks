<?php

class Cards
{
    private array $cards = [];
    private array $suits = [];
    private array $deck = [];
    private int $sumPC = 0;
    private int $sumPlayer = 0;
    private array $delArray= [];

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

    public function shuffleDeck(): void {
        shuffle($this->deck);
    }

    public function getCard(): string
    {
        $x = rand(0, count($this->deck) - 1);
        $this->delArray[] = $this->deck[$x];
        return $this->deck[$x];
    }

//    public function unsetCard()
//    {
//        $sr = array_search($this->delArray[0], $this->deck);
//        unset($this->deck[$sr]);
//        unset($this->delArray[0]);
//        var_dump($sr);
//
//    }

    public function getDeck(): array
    {
        return $this->deck;
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
//    these methods should be here, not in the Card class
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
    $play->shuffleDeck();
    $play->declareValues();
    echo $play->calculatePlayerCardValue($play->getCard()) . PHP_EOL;
//    $play->unsetCard();
    echo $play->calculatePlayerCardValue($play->getCard()) . PHP_EOL;
//    $play->unsetCard();
    echo "Sum : " . $play->getSumPlayer() . PHP_EOL;
    echo "------------------------" . PHP_EOL;
    while ($play->getSumPlayer() <= 21 && $play->getSumDealer() <= 21) {
        $option = readline("press [2] to hold or [3] to pick a card! ");
        if ($option == 2) {
            echo $play->calculateDealerCardValue($play->getCard()) . PHP_EOL;
//            $play->unsetCard();
            echo $play->calculateDealerCardValue($play->getCard()) . PHP_EOL;
//            $play->unsetCard();
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
//                    $play->unsetCard();
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
//            $play->unsetCard();
            echo "Sum : " . $play->getSumPlayer() . PHP_EOL;
            echo "------------------------" . PHP_EOL;
            if ($game->isItOver21($play->getSumPlayer())) {
                echo "Dealer wins! Player has {$play->getSumPlayer()}";
                exit;
            }
        }
    }
}


