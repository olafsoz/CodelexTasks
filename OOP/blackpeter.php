<?php


class Card
{
    private string $suit;
    private string $symbol;
    private string $color;

    public function __construct(string $suit, string $symbol)
    {
        $this->suit = $suit;
        $this->symbol = $symbol;
        $this->color = $this->setColor();
    }

    public function getSuit(): string
    {
        return $this->suit;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function setColor(): string
    {
        if ($this->getSuit() == '♦' || $this->getSuit() == '♥') {
            return "R";
        } else {
            return "B";
        }
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getDisplayValue(): string
    {
        return $this->symbol . $this->suit;
    }
}

class Deck
{
    private array $cards;
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

    public function remove(Player $p1, Player $p2): void
    {
        $key = array_rand($p2->getCards());
        $p1->cards[] = $p2->cards[$key];
        unset($p2->cards[$key]);
        $p1->disband();
        $p2->disband();
    }

    public function disband()
    {
        $symbols = [];
        foreach ($this->cards as $card) {
            $symbols[] = $card->getSymbol() . $card->getColor();
        }

        $uniqueCardsCount = array_count_values($symbols);

        foreach ($uniqueCardsCount as $symbol => $count) {
            if ($count === 1) continue;
            if ($count === 2 || $count === 4) {
                foreach ($this->cards as $index => $card) {
                    if ($card->getSymbol() . $card->getColor() === (string)$symbol) {
                        unset($this->cards[$index]);
                    }
                }
            }
            if ($count === 3) {
                for ($i = 0; $i < 2; $i++) {
                    foreach ($this->cards as $index => $card) {
                        if ($card->getSymbol() . $card->getColor() === (string)$symbol) {
                            unset($this->cards[$index]);
                            break;
                        }
                    }
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
        $this->deck = new Deck();
    }

    public function getDeck(): Deck
    {
        return $this->deck;
    }

    public function deal(): Card
    {
        return $this->deck->draw();
    }

    public static function equalCards(Card $firstCard, Card $secondCard): bool
    {
        return $firstCard->getSymbol() === $secondCard->getSymbol();
    }

    public function printCards($player): void
    {

        foreach ($player->getCards() as $card) {
            echo '|' . $card->getDisplayValue() . $card->getColor() . '|';
        }
        echo PHP_EOL;
    }

    public function checkWinner(Player $player): bool
    {
        if (count($player->getCards()) == 0) {
            return true;
        } else {
            return false;
        }
    }
}

$game = new BlackPeter();
$player = new Player();
$bot = new Player();

//Deal
for ($i = 0; $i < 25; $i++) {
    $player->addCard($game->deal());
}

for ($i = 0; $i < 24; $i++) {
    $bot->addCard($game->deal());
}

echo "Player : ";
$game->printCards($player);

echo "Bot : ";
$game->printCards($bot);

echo "-----------------------" . PHP_EOL;

while (true) {
    $player->remove($bot, $player);
    $player->remove($player, $bot);

    echo "Player : ";
    $game->printCards($player);
    echo "Bot : ";
    $game->printCards($bot);

    echo "-----------------------" . PHP_EOL;

    if ($game->checkWinner($player)) {
        echo "Player is the winner!!!";
        exit;
    }

    if ($game->checkWinner($bot)) {
        echo "Bot is the winner!!!";
        exit;
    }
    sleep(1);
}










