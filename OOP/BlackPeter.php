<?php


class Deck
{
    private array $cards = [];
    private array $symbols = [
        '♣', '♦', '♥', '♠'
    ];

    public function __construct(array $cards = [])
    {
        $this->cards = $cards;
        if (empty($this->cards)) $this->shuffle();
    }

    public function draw(): Card
    {
        $randomCardIndex = array_rand($this->cards);
        $card = $this->cards[$randomCardIndex];
        array_splice($this->cards, $randomCardIndex, 1);
        return $card;
    }

    private function shuffle(): void
    {
        $this->cards = [];
        for ($i = 1; $i <= 13; $i++) {
            for ($j = 0; $j < 4; $j++) {
                switch ($i) {
                    case 11:
                        break;
                    case 12:
                        $this->cards[] = new Card($this->symbols[$j], 'Q');
                        break;
                    case 13:
                        $this->cards[] = new Card($this->symbols[$j], 'K');
                        break;
                    default:
                        $this->cards[] = new Card($this->symbols[$j], $i);
                        break;
                }
            }
        }
        $this->cards[] = new Card('♠', 'J');
    }

    public function getCards(): array
    {
        return $this->cards;
    }
}

class Card
{
    private string $suit;
    private string $symbol;

    public function __construct(string $suit, string $symbol)
    {
        $this->suit = $suit;
        $this->symbol = $symbol;
    }

    public function getSuit(): string
    {
        return $this->suit;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getDisplayValue(): string
    {
        return "{$this->symbol}.{$this->suit}";
    }

    public static function equalCards(Card $firstCard, Card $secondCard)
    {
        $firstCard->getSymbol() === $secondCard->getSymbol();
    }
}

class Player
{
    private array $cards = [];

    public function getCards(): array
    {
        return $this->cards;
    }

    public function addCard(Card $card): void
    {
        $this->cards[] = $card;
    }

    public function disband()
    {
        $symbols = [];
        foreach ($this->cards as $card) {
            $symbols[] = $card->getSymbol();
        }

        $uniqueCardsCount = array_count_values($symbols);

        foreach ($uniqueCardsCount as $symbol => $count) {
            if ($count === 1) continue;
            if ($count === 2 || $count === 4) {
                foreach ($this->cards as $index => $card) {
                    if ($card->getSymbol() === (string)$symbol) {
                        unset($this->cards[$index]);
                    }
                }
            }
            if ($count === 3) {
                for ($i = 0; $i < 2; $i++) {
                    foreach ($this->cards as $index => $card) {
                        if ($card->getSymbol() === (string)$symbol) {
                            unset($this->cards[$index]);
                            break;
                        }
                    }
                }
            }
        }
    }

    public function disbandLastCards($obj)
    {
        foreach ($this->cards as $index => $card) {
            foreach ($obj->getCards() as $ind => $crd) {
                if ($card->getSymbol() === $crd->getSymbol()) {
                    unset($this->cards[$index]);
                    unset($obj->cards[$ind]);
                }
            }
        }
    }
}

class BlackPeter
{

    private Deck $deck;

    public function __construct()
    {
        $this->deck = new Deck;
    }

    public function getDeck(): Deck
    {
        return $this->deck;
    }

    public function deal(): Card
    {
        return $this->deck->draw();
    }
}

$game = new BlackPeter();
$player = new Player();
$npc = new Player();

//Deal
for ($i = 0; $i < 25; $i++) {
    $player->addCard($game->deal());
}

for ($i = 0; $i < 24; $i++) {
    $npc->addCard($game->deal());
}

foreach ($player->getCards() as $card) {
    echo "|" . $card->getDisplayValue() . "|";
}
echo PHP_EOL;

$player->disband();

foreach ($player->getCards() as $card) {
    echo "|" . $card->getDisplayValue() . "|";
}

echo PHP_EOL;
echo "-------------------------";
echo PHP_EOL;

foreach ($npc->getCards() as $card) {
    echo "|" . $card->getDisplayValue() . "|";
}
echo PHP_EOL;
$npc->disband();

foreach ($npc->getCards() as $card) {
    echo "|" . $card->getDisplayValue() . "|";
}
echo PHP_EOL;
echo "-------------------------";
echo PHP_EOL;

$player->disbandLastCards($npc);

if (empty($player->getCards())) {
    echo "|   |";
} else {
    foreach ($player->getCards() as $card) {
        echo "|" . $card->getDisplayValue() . "|";
    }
}
echo PHP_EOL;

if (empty($npc->getCards())) {
    echo "|   |";
} else {
    foreach ($npc->getCards() as $card) {
        echo "|" . $card->getDisplayValue() . "|";
    }
}






