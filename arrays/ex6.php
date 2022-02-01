<?php
//hangman game

$randomWords = [
    "kangaroo",
    "christmas",
    "fairytale",
    "nightclub",
    "yachtsman",
    "programming",
    "yorkshire"
];

$word = shuffle($randomWords);
$word = $randomWords[0];
$answerArray = [];
for ($i = 0; $i < strlen($word); $i++) {
    $answerArray[$i] = "-";
}
$misses = [];

//create a var to hold the number of remaining letters there are
$remainingLetters = strlen($word);

echo "Let's play the hangman game!" . PHP_EOL;
echo "You can only miss 5 letters per word" . PHP_EOL;
// main game loop
while ($remainingLetters > 0 && count($misses) <= 5) {
    echo implode(" ", $answerArray) . PHP_EOL;
    $guess = readline("Guess a letter or \"q\" to quit ");
    if (strtolower($guess) == "q") {
        echo "Thanks for playing!";
        exit;
    } else if(strlen($guess) !== 1) {
        echo "Enter only one letter" . PHP_EOL;
    } else if (ctype_upper($guess)) {
        echo "Enter a lowercase letter" . PHP_EOL;
    } else if (is_numeric($guess)) {
        echo "Enter a letter" . PHP_EOL;
    } else {
        $counter = 0;
        for ($j = 0; $j < strlen($word); $j++) {
            if ($word[$j] === $guess) {
                $answerArray[$j] = $guess;
                $remainingLetters -= 1;
                $counter += 1;
            }
        }
        if ($counter === 0) {
            $misses[] = $guess;
        }
        echo "Misses : " . implode(" ", $misses) . PHP_EOL;
    }
}
    echo implode(" ", $answerArray) . PHP_EOL;
    if ($remainingLetters === 0) {
        echo "Good job! The word was : " . $word;
    } else {
        echo "You ran out of tries. The word was " . $word;
    }


