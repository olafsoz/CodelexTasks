<?php
//ex 1

function one($int, $int2): string {
    if (is_int($int) && is_int($int2)) {
        if (($int == 15 || $int2 == 15) || ($int + $int2 == 15 || $int - $int2 == 15 || $int2 - $int == 15)) {
            return "true";
        } else {
            return "false";
        }
    } else {
        return "enter an integer";
    }
}
echo one(15, 2);

//ex 2
//
//function checkOddEven($int): string {
//    if (is_numeric($int)) {
//        if ($int % 2 == 0) {
//            return "$int is even\nBye!";
//        } else if ($int % 2 == 1) {
//            return "$int is odd\nBye!";
//        } else {
//            return "what";
//        }
//    } else {
//        return "Enter a numeric value\nBye!";
//    }
//}
//echo checkOddEven(8);

//ex 3

$lowerBound = 1;
$upperBound = 100;
$sum = 0;
$count = 0;
for ($i = $lowerBound; $i <= $upperBound; $i++) {
    $sum += $i;
    $count = $count + 1;
}
echo $sum . PHP_EOL . $sum / $count;

//ex 4

function fact($num): string{
$factorial = 1;
for ($x = $num; $x >= 1; $x--) {
    $factorial = $factorial * $x;
}
    return "Factorial of $num is $factorial";
}
echo fact (10);

//ex 5

//function randomGuess() {
//    $number = rand(1, 100);
//    echo "I am thinking of a number between 1 and 100, try to guess it!";
//    $val = readline("\nGuess(1-100) : ");
//    if ($val == $number) {
//        return "You guessed it, what are the odds??";
//    } else if ($val > $number) {
//        return "Too high. I was thinking of $number";
//    } else if ($val < $number) {
//        return "Too low. I was thinking of $number";
//    }
//}
//echo randomGuess();

//ex 6

function cozaLozaWoza($int) {
    for ($i = 1; $i <= $int; $i++) {
        if ($i % 7 === 0 && $i % 5 === 0 && $i % 3 === 0) {
            echo 'cozalozawoza ';
        } else if ($i % 5 === 0 && $i % 3 === 0) {
            echo 'cozaloza ';
        } else if ($i % 7 === 0) {
            echo 'woza ';
        } else if ($i % 5 === 0) {
            echo 'loza ';
        } else if ($i % 3 === 0) {
            echo 'coza ';
        } else {
            echo $i . " ";
        }
        if ($i % 11 === 0) {
            echo PHP_EOL;
        }
    }
}
cozaLozaWoza(110);

//ex 7

//ex 8

function pay($base, $hours) {
    if ($base > 8) {
        if ($hours <= 40) {
            return $base * $hours . 'eur' . PHP_EOL;
        } else if ($hours > 40 && $hours < 60) {
            $first = $base * 40;
            $second = ($hours - 40) * ($base * 1.5);
            return $first + $second . 'eur' . PHP_EOL;
        } else if ($hours > 60) {
            return 'You can not work for more than 60 hours' . PHP_EOL;
        } else {
            return 'how did you get here?';
        }
    } else {
        return "the minimum wage is 8.00$ an hour" . PHP_EOL;
    }
}
echo pay(7.5, 35);
echo pay(8.2, 47);
echo pay(10, 73);

//ex 9

    echo "Let's calculate your BMI! \nFor imperial Input height in inches and weight in pounds . For metric input height in cm and weight in kg.\nIn the next line type 'imperial' or 'metric', then your height and weight respectively.\n";
    $val = readline();
    $val = strtolower($val);
    $height = readline();
    $weight = readline();

    function calculate($height, $weight): string
    {
        $BMI = round(($weight / ($height * $height)) * 703, 1);
        if ($BMI > 18.5 && $BMI < 25) {
            return "Your BMI is $BMI. You have optimal weight";
        } else if ($BMI > 25) {
            return "Your BMI is $BMI. You are overweight";
        } else {
            return "Your BMI is $BMI. You are underweight";
        }
    }

    if ($val === 'imperial') {
        echo calculate($height, $weight);
    } else if ($val === 'metric') {
        $height *= 0.393700787;
        $weight *= 2.2;
        echo calculate($height, $weight);
    } else {
        return 'Did you type exactly as shown?';
    }


//ex 10

class geometry {
    public static function areaCircle($radius) {
        if ($radius > 0) {
            return M_PI * ($radius * $radius);
        } else {
            return "error";
        }
    }
    public static function areaRectangle($length, $width) {
        if ($length > 0 && $width > 0) {
            return $length * $width;
        } else {
            return "error";
        }
    }
    public static function areaTriangle($lengthBase, $triHeight) {
        if ($lengthBase > 0 && $triHeight > 0) {
            return $lengthBase * $triHeight * 0.5;
        } else {
            return "error";
        }
    }
}
echo "Geometry Calculator\n";
echo "1. Calculate the Area of a Circle\n";
echo "2. Calculate the Area of a Rectangle\n";
echo "3. Calculate the Area of a Triangle\n";
echo "4. Quit\n";
echo "Enter your choice (1-4) : ";
$val = readline();
if ($val < 1 || $val > 4) {
    echo "error";
} else if ($val == 1) {
    echo geometry::areaCircle(3);
} else if ($val == 2) {
    echo geometry::areaRectangle(5, 4);
} else if ($val == 3) {
    echo geometry::areaTriangle(3, 6);
} else {
    exit;
}


